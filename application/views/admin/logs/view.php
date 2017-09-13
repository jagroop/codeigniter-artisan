<style>
  .data {
    padding: 12px;
    font-size: 18px;
  }
  .data p {
    text-align: center;
  }

  pre {
    background: #fff;
    border: none;
  }
  pre code {
    color: #c7254e;
    background-color: #f9f2f4;
    border-radius: 4px;
  }
</style>
<div class="panel panel-default">
  <div class="panel-heading">
  <?php echo $log; ?>
  <a id="pauseResume" class="btn btn-xs btn-primary pull-right" href="#">Pause</a>
  </div>
  <div class="panel-body">
    <div class="data">
        <p>Loading...</p>
    </div>
</div>

<script>
  var pause = false;
  $(document).ready(function(){
    $("#pauseResume").click(function(e){
      e.preventDefault();
      var el = $(this);
      if(el.text() == "Pause")
      {
        pause = true;
        return el.text("Resume");
      }
      pause = false;
      return el.text("Pause");
    });
  });
  var url = '<?php echo url('admin/logs/read/' . $log) ?>';
  setInterval(function(){
    if(pause === false)
    {
      $.get(url, function(res, status){
        $(".data").empty();
        data = '<pre>';
        data += res;
        data += '</pre>';
        $(".data").html(data);
      });
    }
  }, 2000);
</script>
