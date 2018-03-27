<?php
    include "header.php";
?>
<script src="angular.min.js"></script>
      <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Subject : <?php echo $_COOKIE['Subject']; ?></h5>

                            <div class="ibox-tools">
                                <form action="attendance_xml.php" method="POST">
                                        <input type="submit" name="download" class="btn btn-primary" value="Download xml">
                                </form>
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div ng-app="myApp" ng-controller="customersCtrl" class="ibox-content">

                            <table class="footable table table-stripped toggle-arrow-tiny">
                                <thead>
                                <tr >
                                    <th data-toggle="true">Roll No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Attendance</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr ng-repeat="x in names">
                                    <td>{{ x.s_roll }}</td>
                                    <td>{{ x.s_name }} {{ x.s_lname }}</td>
                                    <td>{{ x.s_email }}</td>
                                    <td><div ng-if=" x.subject == '<?php echo $_COOKIE['Subject']; ?>'"><i class="fa fa-close text-danger"></i></div>
                                        <div ng-if=" x.subject != '<?php echo $_COOKIE['Subject']; ?>'"><i class="fa fa-check text-navy"></i></div></td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>

var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http, $timeout) {
  $scope.reload = function(){ $http.get("ESP_api.php")
   .then(function (response) {$scope.names = response.data.data;});

    $timeout(function(){
      $scope.reload();
    },1500)
      
  };
    $scope.reload();
});
// https://beta2.webathon.in/callr
</script>
<?php
    include "footer.php";
?>