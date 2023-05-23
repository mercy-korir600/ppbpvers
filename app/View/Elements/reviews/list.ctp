<!-- <div class="row"> -->
    <!-- <div class="col-xs-12"> -->
    <?php 
        foreach ($reviews as $key => $review) {
      ?>
      <a class="btn btn-link btn-comment" role="button" data-toggle="collapse" href="#comment<?php echo $review['id'] ?>" aria-expanded="false" 
            aria-controls="comment<?php echo $review['id'] ?>">
        <?php echo ($key+1).'.  '.$review['User']['name'].' <small><em>'.$review['created'].'</em></small> <br><small class="muted"></small>' ?>
      </a>
        <div id="comment<?php echo $review['id'] ?>" class="bs-example">
            <table class="table table-condensed">
              <tbody>
                <tr>
                  <th> <p><strong>Sender</strong></p> </th> 
                  <td> 
                    <div>
                      <p class="form-control-static"><?php echo $review['User']['name'] ?></p>
                    </div>
                  </td>
                </tr>
                
                <tr>
                  <th> <p><strong> Review </strong></th> 
                  <td> <p class="form-control-static"><?php echo $review['comment'] ?></p> </td>
                </div> 
                <tr>
                  <th> <p> <strong> File(s) </strong> </p> </th>
                  <td>
                    <?php
                    if(isset($review['Attachment'])) {
                      foreach ($review['Attachment'] as $key => $value) {
                        echo '<p>';
                         echo $this->Html->link(__($value['basename']),
                           array('controller' => 'comments',  'action' => 'comment_file_download', $value['id'],
                             'admin' => false),
                           array('class' => 'btn btn-link')); 
                         echo '</p>';
                        }
                    }
                      
                    ?>
                  </td>                    
                </tr> 
                </tbody>
              </table> 
        </div><br>
        <?php } ?>
    <!-- </div> -->
<!-- </div> -->