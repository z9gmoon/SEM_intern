<div class="row">
          
          <div class="col-md-12 product_img">
            <center>
              <!-- <img src="{{ asset('img/avatar-1577909_960_720.png') }}" class="img-responsive" class="center" style="height: 61px;width: 70px;"> -->
              @if(!($listEngi->avatar))
                        <img src="{{ asset('img/avatar-1577909_960_720.png') }}" class="img-responsive" class="center" style="height: 61px;width: 70px; padding: 5px;
    border: solid 1px #EFEFEF;border-radius: 50%;">
                        @else
                        <img src="{{ asset('upload/' . $listEngi->avatar) }}" class="img-responsive" class="center" style="height: 61px;width: 70px;padding: 5px;
    border: solid 1px #EFEFEF;border-radius: 50%;">
                        @endif
            </center>
          </div> 
          <div class="col-md-2 col-xs-offset-2 col-xs-2 product_content" style="margin-left: 30px;" >
            <h4 class="text-center">{{$listEngi->engineerName}}</h4>
              <input type="hidden" name="yes" value="<?php $yes= "<p id='yes'> </p>"; echo $yes;?>" />
            <table class="table">
              <tbody>
               <tr>
                 <td><label class="control-label">Date Of Birth</label></td>
                 <td>{{$listEngi->birthday}}</td>
               </tr>
               <td><label class="control-label">Experience</label></td>
               <td>{{$listEngi->Experience}}</td>
             </tr>
             <tr>
               <td><label class="control-label">Date Join</label></td>
               <td>{{$listEngi->dateJoin}}</td>
             </tr>
             <tr>
               <td><label class="control-label">Adress</label></td>
               <td>{{$listEngi->Address}}</td>
             </tr>
             <td><label class="control-label">Phone</label></td>
                <td>{{$listEngi->Phone}}</td>
           </tr>
           <td><label class="control-label">Email</label></td>
                <td>{{$listEngi->Email}}</td>
                 </tr>
                 <td><label class="control-label">Technical</label></td>
                 <td>{{$listEngi->TechSkill}}</td>
               </tr>
             </tbody>
            </table>

         </div>