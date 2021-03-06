            <div class="a">
                <div class="b">
                    <div class="c">
                        <a id="us" href="<?=$data['BASE_HREF'];?>/settings">
                            <div class="g is" alt="Settings" title="Settings"></div>
                        </a>
                        
                        <div class="fr">
                        <a id="ac" href="<?=$data['BASE_HREF'];?>/requests/add">
                            <div class="g ia" alt="Add Contact" title="Add Contact"></div>
                        </a>
                    </div>
                </div>
                    
                <div class="d">
                    <a class="v gb y" href="<?=$data['BASE_HREF'];?>/contacts">Start Conversation</a>
                    
                    <a class="x" href="<?=$data['BASE_HREF'];?>/contacts">
                        <div class="g ic" alt="Contacts" title="Contacts"></div>
                    </a>
                </div>
                    
                <div class="e" id="h">
                    <?php if ($data['newconversation'] != null && count($data['newconversation']) > 0) { ?>
                        
                    <div class="f k">
                        <div class="i"><?=$data['newconversation'][0]['username'];?></div>
                        <div class="j fr"><?=$data['currenttime'];?></div>
                        <div class="z"></div>
                    </div>
                    <?php } ?>
                    <?php foreach ($data['conversations'] as $conversation) { ?>
                        
                    <div class="f <?php if ($data['cguid'] && $conversation->conversation_guid === $data['cguid']) echo "k"; ?>">
                        <a href="<?=$data['BASE_HREF'];?>/conversations/display/<?=$conversation->contact_guid . "/" . $conversation->conversation_guid;?>#l">
                            <div class="i"><?php if ($conversation->alias !== "") echo $conversation->alias . " - "; echo $conversation->username; ?></div>
                        </a>
                        <div class="cc j fr" data-md="<?=$conversation->made_date;?>">
                            <?=$conversation->getMadeDate();?>
                            &nbsp;
                            
                            <a href="<?=$data['BASE_HREF'];?>/conversations/delete/<?=$conversation->conversation_guid;?>">
                                <div class="g id ac" alt="Delete Conversation" title="Delete Conversation"></div>
                            </a>
                        </div>
                        
                        <div class="z"></div>
                    </div>
                    
                    <?php } ?>
                    
                </div>
                </div>
                
                <div class="l">
                    <div class="m">
                        <a id="ul" href="<?=$data['BASE_HREF'];?>/logout">
                            <div class="g il fr" alt="Logout" title="Logout"></div>
                        </a>
                        
                        <div class="z"></div>
                    </div>
                    
                    <div class="n">
                        <?php if ($data['messages'] != null) {
                                foreach ($data['messages'] as $message) { 
                                    if ($message->user2_guid === $data['user']->guid && $message->direction === 1) $sent = true; else $sent = false;
                        ?>
                        
                        <div class="o <?php echo $sent ? "fr" : "fl"; ?>">
                            <div class="q <?php echo $sent ? "s" : "r"; if($message->signature === 1) echo " ae"; ?>">
                                <?php if($message->signature === 1) { ?>
                                
                                <div class="ad">
                                    -= Message has been tampered with =-
                                </div>
                                <?php } ?>
                                
                                <?=$message->message;?>
                                
                            </div>
                            
                            <div class="z j aa <?php echo $sent ? "fr" : "fl";?>" data-md="<?=$message->made_date;?>">
                                <?=$message->getMadeDate();?>
                                
                            </div>
                        </div>
                        <div class="p"></div>
                        <?php } } elseif ($data['guid'] === null) { ?>
                        
                        <h3 class="ab">Start a new conversation or select an existing one on the left.</h3>
                        <?php } ?>
                        
                        <div id="l"></div>
                    </div>
                </div>
                
                <form method="POST" action="<?=$data['BASE_HREF'];?>/conversations/send" id="s">
                    <div class="t">
                        <textarea class="u" name="m" id="m" placeholder="Enter your message here."<?php if ($data['guid'] === null) echo " disabled"; else echo " autofocus"; ?>></textarea>
                        <input class="v w" type="submit" name="ssubmit" id="z" value="Send"<?php if ($data['guid'] === null) echo " disabled"; ?>>
                        <input type="hidden" name="tg" value="<?=$data['guid'];?>">
                        <input type="hidden" name="token" value="<?=$data['token'];?>">
                    </div>
                </form>
            </div>
            
            <div class="h" id="c"><?php echo $data['cguid'] !== null ? $data['cguid'] : ""; ?></div>
            <div class="h" id="g"><?php echo $data['guid'] !== null ? $data['guid'] : ""; ?></div>
