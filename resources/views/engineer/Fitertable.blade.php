 <script  src="js/matrix.tables.js" sycn></script>
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <button onclick="transferAddEngineer()" class="btn btn-info" style="margin: 3px 0px 0px 3px;">Add Engineer</button>

            </div>
            <div class="widget-content nopadding">
             
             

              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Technical Skills</th>
                    <th>experience</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($list as $list)
                  <tr class="gradeX {{$list->idEngineer}} bodyparts">
                    <td><a data-toggle="modal" onclick="showDetailEngi('{{$list->idEngineer}}')" class="hello" href="#product_view">{{ $controller->idName($list->idEngineer) }}</a></td>
                    <td><a data-toggle="modal" onclick="showDetailEngi('{{$list->idEngineer}}')" class="hello" href="#product_view">{{ $list->engineerName }}</a></td>
                    <td>{{ $list->Address }}</td>
                    <td>{{ $list->Phone }}</td>
                    <td>{{ $list->Email }}</td>
                    <td>{{ $list->TechSkill }}</td>
                    <td>{{ $list->Experience }}</td>
                    <td> <a href="EditEngineer/{{$list->idEngineer}}" ><i class="icon-edit" style="margin-left: 10px;"></i></a></td>

                    <td> <a href="#myAlertEngi" data-toggle="modal" onclick="IdToModalEngi('{{$list->idEngineer}}')"><i class="icon-remove" style="margin-left: 15px;"></i></a></td>

                  </tr> 
                  @endforeach
                </tbody>
              </table>

            </div>
         
          </div>
        </div>