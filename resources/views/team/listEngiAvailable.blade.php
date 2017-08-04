{{--<script  src="{{asset('js/matrix.tables.js')}}"></script>--}}
{{--<script  src="js/matrix.tables.js" sync></script>--}}
<script>
    $(document).ready(function(){
        $(".table-engi-available").DataTable({
            "bJQueryUI": true,//reUI style for entries field
            "sPaginationType": "full_numbers",//show number in pagination
            "sDom": '<""l>t<"F"fp>'//restyle,pos for pagination
        });
//        $('input[type=checkbox],input[type=radio],input[type=file]').uniform();

        $('select').select2();

//        $("span.icon input:checkbox, th input:checkbox").click(function() {
//            var checkedStatus = this.checked;
//            var checkbox = $(this).parents('.widget-box').find('tr td:first-child input:checkbox');
//            checkbox.each(function() {
//                this.checked = checkedStatus;
//                if (checkedStatus == this.checked) {
//                    $(this).closest('.checker > span').removeClass('checked');
//                }
//                if (this.checked) {
//                    $(this).closest('.checker > span').addClass('checked');
//                }
//            });
//        });
        $('.add-member').on('click',function(){
            $.ajax({
                url : "/Team/ListAvailable",
                type : "get",
                //dataType:"text",
                success:function(result){
                    $('#modaladdTeam .modal-body').html(result);
                    $('#modaladdTeam').modal();

                }

            });
        });
    });
</script>
<meta name="_token" content="{!! csrf_token() !!}"/>
{{--<script>--}}
    {{--$.ajaxSetup({--}}
        {{--headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }--}}
    {{--});--}}
{{--</script>--}}
<div class="row-fluid" >
    <div class="span12">
        <div class="widget-box">
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped table-engi-available">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Member name</th>
                        <th>Email</th>
                        <th>Add</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($engineers as $engineer)
                        <tr class="gradeX">
                            <td>{{$engineer->idEngineer}}</td>
                            <td>{{$engineer->engineerName}}</td>
                            <td>{{$engineer->Email}}</td>
                            <td style="text-align: center"><input type="checkbox" name="engi" value="{{$engineer->idEngineer}}" data-name="{{$engineer->engineerName}}" data-email="{{$engineer->Email}}"></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
