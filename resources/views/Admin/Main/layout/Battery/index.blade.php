<div class="col-sm-12">
    <div ng-app="battery" ng-controller="batteryController">
        <div class="searchbattery">
          <label for="idshearch"><i class='bx bx-search-alt'></i>Search Battery</label>
          <input type="search" ng-model="test"  id="idshearch"  >
        </div>
        <div class="row listbattery">
          <div class="col-sm-3" ng-repeat = "x in names | filter : test" >
            <div class="title-battery">
              <img src = "{{asset("storage/image/Battery")}}/@{{x.image}}.jpg" style="transform: skewY(-30deg);" >

            </div>
            <div class="produce">
              <div class="groupbutton">
                <div class="id">
                  <h3>@{{ x.id }}</h3>
                </div>
                <div class="edit">
                  <button type="button" data-bs-toggle="modal" data-bs-target="#modal@{{ x.id }}">
                    <i class='bx bx-message-square-edit' ></i>
                  </button>

                  <div class="modal fade" id="modal@{{ x.id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3>Edit Battery</h3>
                          <button type="button" data-bs-dismiss="modal" class="btnclose"><i class='bx bx-x'></i></button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="{{route("battery.update")}}" enctype="multipart/form-data">
                            <div class="col-sm-12">

                                <div class="form-floating">
                                    <input value="@{{ x.name_battery }}" type="text" name="nameedit" id="nameedit" required autocomplete="off" autofocus class="form-control" placeholder="Name Battery">
                                    <label for="nameedit">Name Battery</label>
                                </div>
                            </div>
                            <div class = "col-sm-12">
                                <div class="row">
                                    <div class="col-sm-4">

                                        <div class="form-floating">
                                            <input value="@{{ x.size }}" type="text" class="form-control" name = "sizeedit" id="sizedit"  required = "size" autocomplete="off" placeholder="Size">
                                            <label for="sizedit">Size</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">

                                        <div class="form-floating">
                                            <input value="@{{ x.shape }}" type="text" class="form-control" required name = "shapeedit" autocomplete="off" placeholder="Shape" id="shapeedit" >
                                            <label for="shapeedit">Shape</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">

                                        <div class="form-floating">
                                            <input value="@{{ x.point }}" type="number" class="form-control" id="pointedit" required name = "pointedit" autocomplete="off"  min="1" max="20" step="1" placeholder="Point">
                                            <label for="pointedit">Point</label>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-sm-12">
                                @csrf
                                <button type = "submit" name = "submitbatteryedit" value="@{{x.id}}">
                                  Upload
                                </button>

                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class = "delete" >
                  <form method="POST" action="{{route("battery.delete")}}">
                    @csrf
                    <button type="submit" name="deleteBattery" value="@{{x.id}}-@{{x.image}}"><i class="material-icons">delete</i></button>
                  </form>


                </div>
              </div>
              <div class="productcontent">
                <h4 class="namebattery"><b>@{{ x.name_battery }}</b></h4>
                <ul>
                  <li>Shape: @{{ x.shape }}</li>
                  <li>Size: @{{ x.size }}</li>
                  <li>Point: @{{ x.point }}</li>
                </ul>
              </div>
            </div>
          </div>

        </div>

      </div>
      <div id="demo">

      </div>
</div>
<div class="viewInsert">
    <button type = "button" class="viewInsertButton">
        <a href="{{route("battery.create")}}">
            <i class='bx bx-plus'></i>
        </a>
    </button>
</div>



  <script>
      var app = angular.module("battery" , []);

        app.controller("batteryController" , function($scope , $http){
          $http.get("{{route("api.battery")}}")
        .then(function (response) {

            if(response.data.status = 200){
                $scope.names = response.data.records;

            }
         });
    })




  </script>

