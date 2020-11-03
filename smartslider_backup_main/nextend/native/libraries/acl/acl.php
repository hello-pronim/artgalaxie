<?php

class N2Acl extends N2AclAbstract
{

    public function authorise($action, $info) {
        return true;
    }
}