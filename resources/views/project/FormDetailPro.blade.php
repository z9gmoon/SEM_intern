<form action="" method="" class="form-horizontal" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
 
      <div class="control-group">

        <label class="control-label">Project ID:</label>

        <div class="controls">

             <p id = "trrr">{{$controllerID->idName($getDetail[0]->idProject)}}</p>

        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Project Name :</label>
        <div class="controls">
          <p id ="name">{{$getDetail[0]->projectName}}</p>
        </div>
      </div>
     
      <div class="control-group">
        <label class="control-label">Status :</label>
        <div class="controls">

          <p id= "status"><span class="{{$controllerColor->changeColor($getDetail[0]->status)}}">{{$controller->getStatus($getDetail[0]->status)}}</span></p>

        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Technical Skill :</label>
        <div class="controls">
          <p id="tech">{{$getDetail[0]->techSkill}}</p>
        </div>
      </div>

      <div class="control-group">

        <label class="control-label">Date Of Begin :</label>

        <div class="controls">
          <p id="begin">{{$getDetail[0]->dateOfBegin}}</p>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label">Date Of End</label>
        <div class="controls">
          <p id="end">{{$getDetail[0]->dateOfEnd}}</p>
        </div>
      </div>
      <div class="control-group">

        <label class="control-label">Customer :</label>

        <div class="controls">
          <p id="customer">{{$getDetail[0]->customer_code}}</p>
        </div>
      </div>

      <div class="control-group">

        <label class="control-label">Id Team :</label>
        <div class="controls">
          <p id="idtm">{{$getDetail[0]->idTeam}}</p>
        </div>
      </div>
    </form>