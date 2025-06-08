<?php

for($count=10; $count > 0 ; $count--){
    echo $count,"...";
    if(1 == $count){
        sleep(1);
        echo "LiftOff🚀";
    }
    sleep(1);
}