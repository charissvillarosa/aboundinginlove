<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Post extends AppModel {
    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) === $post;
    }
}

?>
