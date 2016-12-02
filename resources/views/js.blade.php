
<div class="ui basic modal">
 
  <div class="header">
   Success!
  </div>
  <div class="image content">
    <div class="image">
      <i class="thumbs up icon"></i>
    </div>
    <div class="description">
        
      <p>{{Session::get('info')}}</p>
      
    </div>
  </div>
  <div class="actions">
    <div class="two fluid ui inverted buttons">
     
      <div class="ui ok green basic inverted button">
        <i class="checkmark icon"></i>
        Ok
      </div>
    </div>
  </div>
</div>
<script>
  
$(document).ready(
    
    function(){
    $('.ui.basic.modal')
  .modal('show')
;
    });
</script>