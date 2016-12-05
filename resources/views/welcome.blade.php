<!DOCTYPE html>
<html>
   <head>
      <title>Diet Share</title>
      <script
         src="https://code.jquery.com/jquery-2.2.4.min.js"
         integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
         crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="{{asset('/dist/semantic.min.css')}}">
      <script src="{{asset('/dist/semantic.min.js')}}"></script>
      <style>
         html, body {
         height: 100%;
         }
      </style>
   </head>
   <body>
      <div class="ui grid">
         <div class="black column">
            <div class="row">
               <div class="left floated one wide column">
                  <h2 style="color:white; margin:10px; padding-top:5px;" class="ui header">Diet Share</h2>
               </div>
               <button onclick="event.preventDefault();" id="addplan" style="margin-top:-40px; margin-right:15px;" class="right floated two wide ui primary button">
                  Add new plan
            </div>
         </div>
      </div>
      </div>
      <div class="ui container">  
      <div style="margin-top:50px;"id="plan_section">
          
      <div class="ui four column doubling stackable grid container">
     
          
        @if($plans!=null)
       
          
          @if($plan_count==1)
           
               <div style="margin-top:10px"  class="column">
      <div  class="ui card">
      <div class="content">
      <div class="header">{{$plans->planname}}</div>
      </div>
      <div class="content">
      <table class="ui teal table">
      <thead>
      <tr><th>Item</th>
      <th>Quantity</th>
      </tr></thead><tbody>
      <tr>
      <td>{{$plans->item1}}</td>
      <td>{{$plans->quantity1}}</td>
      </tr>
      <tr>
      <td>{{$plans->item2}}</td>
      <td>{{$plans->quantity2}}</td>
      </tr>
          <tr>
      <td>{{$plans->item3}}</td>
      <td>{{$plans->quantity3}}</td>
      </tr>
      </tbody>
      </table>
      </div>
      <div class="extra content">
        <form method="post" action="{{route('delete',['plan_id'=>$plans->id])}}">
             {{ csrf_field() }}
      <button type="submit" class="ui button">Remove</button>
            <button onclick="return showShare()" class="ui button">Share</button>
                            
          </form>
          
      </div>
      </div>
      </div>
          
          
          @endif
          
          @if($plan_count>1)
          
          @foreach($plans as $plan)
          
      <div style="margin-top:10px"  class="column">
      <div  class="ui card">
      <div class="content">
      <div class="header">{{$plan->planname}}</div>
      </div>
      <div class="content">
      <table class="ui teal table">
      <thead>
      <tr><th>Item</th>
      <th>Quantity</th>
      </tr></thead><tbody>
      <tr>
      <td>{{$plan->item1}}</td>
      <td>{{$plan->quantity1}}</td>
      </tr>
      <tr>
      <td>{{$plan->item2}}</td>
      <td>{{$plan->quantity2}}</td>
      </tr>
          <tr>
      <td>{{$plan->item3}}</td>
      <td>{{$plan->quantity3}}</td>
      </tr>
      </tbody>
      </table>
      </div>
      <div class="extra content">
         <form method="post" action="{{route('delete',['plan_id'=>$plan->id])}}">
              {{ csrf_field() }}
      <button  class="ui button">Remove</button>
      <button onclick="return showShare()" class="ui button">Share</button>
                            
          </form>
      </div>
      </div>
      </div>
          
          @endforeach
          
          @endif
          @endif
          
     
      </div>
          
          
          
          
     
          
          
          
      </div>
      </div>
      <!-- MODALS -->
       
       <div  id="share" class="ui modal" style="width:350px;margin-left:-180px;">
  <i class="close icon"></i>
  <div class="header">
    Share Now
  </div>
           <div class="content">
           <div class="ui three column grid">
      <div class="column"><i class="facebook f icon large blue"></i></div>
      <div class="column"><i class="twitter icon large teal"></i></div>
      <div class="column"><i class="google plus icon large red"></i></div>
    </div>
           </div>
          
           
       </div>
       
       
       
       
      <div id="add" class="ui modal">
         <i class="close icon"></i>
         <div class="header">
            Add a new plan
         </div>
         <div class="content">
            <div class="description">
                <form method="post" action="{{route('addplan')}}" id="plan" class="ui form">
                    {{ csrf_field() }}
  <div class="field">
      <div class="field">
    <label>Plan name</label>
          
    <input type="text" name="planname" placeholder="Give your plan an awesome name" required>
  </div>
                    <div class="field">
                        <div class="field">
    <label>Add item #1</label>
                            </div>
        
    <div class="two fields">
      <div class="field">
        <input type="text" name="item1" placeholder="Item">
      </div>
       
      <div class="field">
        <input type="text" name="quantity1" placeholder="Quantity">
      </div>
    </div>
        <div class="field">
               <label>Add item #2</label>
                        </div>
        <div class="two fields">
      <div class="field">
        <input type="text" name="item2" placeholder="Item">
      </div>
      <div class="field">
        <input type="text" name="quantity2" placeholder="Quantity">
      </div>
    </div>
                        <div class="field">
    <label>Add item #3</label>
                            </div>
    <div class="two fields">
      <div class="field">
        <input type="text" name="item3" placeholder="Item">
      </div>
      <div class="field">
        <input type="text" name="quantity3" placeholder="Quantity">
      </div>
    </div>
  </div>
    </div>
         </div>
         <div class="actions floated right">
            <div class="ui black deny button">
               Cancel
            </div>
            <div class="ui positive right labeled icon button" onclick="document.forms['plan'].submit();">
               Looks Good
               <i class="checkmark icon"></i>
            </div>
             
            </form>

         </div>
      </div>
          @if(Session::has('info'))
          @include('js');
          @endif
           {{Session::forget('info')}}
      <script type="text/javascript">
         $(document).ready(function () {
              $('#addplan').click(
         function()
         {
           
            $('#add')
            .modal('show');
                
         }
         );
         //your code here
         });
        function showShare()
          {
               $('#share')
            .modal('show');
              return false;
          }
         
      </script>
          
   </body>
</html>