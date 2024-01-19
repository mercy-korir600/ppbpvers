<?php
    $this->Html->script('sadr_reactions', array('inline' => false));
?>
<h5> 
  <div class="control-group"><div class="controls"> <small><button type="button" class="btn btn-small btn-primary" id="addSadrReaction">Add Reaction</button></small> </div> </div>
</h5>

<div>
  <div id="sadr-reactions">
    <?php
      if (!empty($this->request->data['SadrReaction'])) {
          for ($i = 0; $i <= count($this->request->data['SadrReaction'])-1; $i++) {
          ?>
          <div class="sadr-reaction-group">
            <div class="row-fluid">
                <div class="span12">
                <?php 
                    echo $this->Form->input('SadrReaction.'.$i.'.id');
                    echo $this->Form->input('SadrReaction.'.$i.'.reaction',
                                array('label' => false, 'rows'=>1, 'class'=>'span5'));                   

                ?>
              
                </div> 
              <div class="row-fluid">
                <div class="span12">
                  <?php 
                    echo $this->Html->tag('div', '<button id="sadr_reactionsButton'.$i.'" class="btn btn-small btn-danger removeSadrReaction" type="button">Remove Reaction</button>', array(
                        'class' => 'controls', 'escape' => false));
                  ?>
                </div>
              </div>
            </div>
          </div>
                <?php
                }
            }
        ?>
  </div>
</div>
