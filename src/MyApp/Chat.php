<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
class Chat implements MessageComponentInterface
{
    protected $clients;
    protected $group = [];
    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->group = [];
        echo 'Congratulation! The server is running\n';
        
    }
    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "New connection!" . " id :" . $conn->resourceId. "\n";
    }
    
 
    public function onMessage(ConnectionInterface $from, $msg) {
        $data = json_decode($msg);
        $action = $data->type;
        $group = isset($data->group) ? $data->group : "";
        
        // check if the group exit 
        if(($action === 'join') && $group){
            
            if((array_key_exists($group, $this->group) && !in_array($from, $this->group[$group])) || !array_key_exists($group, $this->group)){                
                if(isset($this->group[$group]) && count($this->group[$group]) >= 3){
                    
                    $msg_to_send = json_encode(['type'=>'fullRoom']);
                
                    $from->send($msg_to_send);
                }
                
                else{
                    $this->group[$group][] = $from;
                
                    $this->userIsConnected($group, $from);
                }
            }
            
            else{
               
                $msg_to_send = json_encode(['type'=>'fullRoom']);
                
                $from->send($msg_to_send);
            }
        }
        
       //
        else if($group && isset($this->group[$group])){
           
            foreach($this->group[$group] as $client){
                if ($client !== $from) {
                    $client->send($msg);
                }
            }
        }
    }
    
    public function onClose(ConnectionInterface $conn) {
        
        $this->clients->detach($conn);
        //if one group
        //remove users
        if(count($this->group)){
            foreach($this->group as $group=>$users){
                foreach ($users as $key=>$ratchet_conn){
                    if($ratchet_conn == $conn){
                        unset($this->group[$group][$key]);
                        
                        //notify other subscribers that he has disconnected
                        $this->userIsDisconnected($group, $conn);
                    }
                }
            }
        }
    }
    
    public function onError(ConnectionInterface $conn, \Exception $e) {
        //echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }


    //notifications of connection
    
     
    private function userIsConnected($group, $from){
                        
        echo $from->resourceId . "subscribed to group ".$group ."\n";
        $msgToSend = json_encode(['type'=>'isNewUser', 'group'=>$group]);
        //notify user that someone has joined group
        foreach($this->group[$group] as $client){
            if ($client !== $from) {
                $client->send($msgToSend);
            }
        }
    }
    
    
    private function userIsDisconnected($group, $from){
        $msgToSend = json_encode(['type'=>'Offline', 'group'=>$group]);
        //notify user that remote has left the group
        foreach($this->group[$group] as $client){
            if ($client !== $from) {
                $client->send($msgToSend);
            }
        }
    }
}
    
    

