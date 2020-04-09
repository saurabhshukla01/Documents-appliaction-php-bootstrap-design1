<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="float-right hide-phone">
                                <ul class="list-inline">
                                    <li class="list-inline-item mr-3">
                                        <input class="knob" data-width="48" data-height="48" data-linecap=round
                                                           data-fgColor="#605daf" value="80" data-skin="tron" data-angleOffset="180"
                                                           data-readOnly=true data-thickness=".1"/>
                                    </li>
                                    <li class="list-inline-item">
                                        <span class="text-muted">Storage used</span>
                                        <h6>400GB/524.84GB</h6>
                                    </li>
                                </ul>                                
                            </div>
                            <h4 class="page-title">Dashboard</h4>
                            <div class="btn-group mt-2">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Zoogler</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="icon-contain">
                                            <div class="row">
                                                <div class="col-2 align-self-center">
                                                    <i class="fas fa-tasks text-gradient-success"></i>
                                                </div>
                                                <div class="col-10 text-right">
                                                    <h5 class="mt-0 mb-1"><?php echo $get_list_count; ?></h5>
                                                    <p class="mb-0 font-12 text-muted">Total List</p>   
                                                </div>
                                            </div>                                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body justify-content-center">
                                        <div class="icon-contain">
                                            <div class="row">
                                                <div class="col-2 align-self-center">
                                                    <i class="far fa-gem text-gradient-danger"></i>
                                                </div>
                                                <div class="col-10 text-right">
                                                    <h5 class="mt-0 mb-1"><?php echo $campaign_count; ?></h5>
                                                    <p class="mb-0 font-12 text-muted">Total Campaign</p>
                                                </div>
                                            </div>                                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="col-lg-3">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="icon-contain">
                                            <div class="row">
                                                <div class="col-2 align-self-center">
                                                    <i class="fas fa-database text-gradient-primary"></i>
                                                </div>
                                                <div class="col-10 text-right">
                                                    <h5 class="mt-0 mb-1"><?php echo $get_segment_count; ?></h5>
                                                    <p class="mb-0 font-12 text-muted">Total Segment</p>    
                                                </div>
                                            </div>                                                        
                                        </div>                                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="icon-contain">
                                            <div class="row">
                                                <div class="col-2 align-self-center">
                                                    <i class="fab fa-btc text-gradient-warning"></i>
                                                </div>
                                                <div class="col-10 text-right">
                                                    <h5 class="mt-0 mb-1"><?php echo $blacklist_count; ?></h5>
                                                    <p class="mb-0 font-12 text-muted">Total Blacklist</p>    
                                                </div>
                                            </div>                                                        
                                        </div>                                                    
                                    </div>
                                </div>
                            </div>
                                                                         
                        </div> 
                        <div class="card">
                            <div class="card-body">
                                <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                    <label class="btn btn-primary btn-sm active">
                                        <input type="radio" name="options" id="option1" checked=""> This Week
                                    </label>
                                    <label class="btn btn-primary btn-sm">
                                        <input type="radio" name="options" id="option2"> Last Month
                                    </label>                                                
                                </div>
                                <h5 class="header-title mb-4 mt-0">Weekly Record</h5>
                                <canvas id="lineChart" height="80"></canvas>
                            </div>
                        </div>                                    
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown d-inline-block float-right">
                                    <a class="nav-link dropdown-toggle arrow-none" id="dLabel4" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v font-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel4">
                                        <a class="dropdown-item" href="#">Create Project</a>
                                        <a class="dropdown-item" href="#">Open Project</a>
                                        <a class="dropdown-item" href="#">Tasks Details</a>
                                    </div>
                                </div>
                                <h5 class="header-title mb-4 mt-0">Activity</h5>
                                <div>
                                    <canvas id="dash-doughnut" height="200"></canvas>
                                </div>
								<ul class="list-unstyled list-inline text-center mb-0 mt-3">
                                    <li class="mb-2 list-inline-item text-muted font-13"><i class="mdi mdi-label text-success mr-2"></i>Draft</li>
                                    <li class="mb-2 list-inline-item text-muted font-13"><i class="mdi mdi-label text-danger mr-2"></i>Sent</li>
                                    <li class="mb-2 list-inline-item text-muted font-13"><i class="mdi mdi-label text-warning mr-2"></i>Panding</li>
                                </ul>
                            </div>                               
                        </div>
                        
                    </div>                                
                </div>
                <div class="row">
                    
                    
                    <!--<div class="col-xl-8 col-lg-6">
                		<div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Bar Chart</h4>
                                <p class="text-muted mb-4 font-13 d-inline-block text-truncate w-100">A bar chart is a way of showing data as
                                    bars. It is sometimes used to show trend data, and the comparison of
                                    multiple data sets side by side.</p>

                                <canvas id="bar-data" height="90"></canvas>
                            </div>
                        </div>
                    </div>-->
                    <!--<div class="col-xl-4  col-lg-6">
                        <div class="card timeline-card">
                            <div class="card-body p-0">                               
                                <div class="bg-gradient2 text-white text-center py-3 mb-4">
                                    <p class="mb-0 font-18"><i class="mdi mdi-clock-outline font-20"></i> This Week's Activity</p>                                       
                                </div>
                            </div>
                            <div class="card-body boxscroll">
                                <div class="timeline">
                                    <div class="entry">
                                        <div class="title">
                                            <h6>10/ Oct</h6>
                                        </div>
                                        <div class="body">
                                            <p>There are many variations of passages of  Lorem Ipsum available.....<a href="#" class="text-primary"> Read More</a></p>                                                                
                                        </div>
                                    </div>
                                    <div class="entry">
                                        <div class="title">
                                            <h6>9/ Oct</h6>
                                        </div>
                                        <div class="body">
                                            <p>All the Lorem Ipsum generators on the  predefined chunks as necessary.....<a href="#" class="text-primary"> Read More</a></p>                                                                
                                        </div>
                                    </div>
                                    <div class="entry">
                                        <div class="title">
                                            <h6>8/ Oct</h6>
                                        </div>
                                        <div class="body">
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text.....<a href="#" class="text-primary"> Read More</a></p>                                                                
                                        </div>
                                    </div>
                                    <div class="entry">
                                        <div class="title">
                                            <h6>7/ Oct</h6>
                                        </div>
                                        <div class="body">
                                            <p class="pb-1">Many desktop publishing packages and web page editors now.....<a href="#" class="text-primary"> Read More</a></p>                                                                
                                        </div>
                                    </div> 
                                    <div class="entry">
                                        <div class="title">
                                            <h6>6/ Oct</h6>
                                        </div>
                                        <div class="body">
                                            <p class="pb-1 mb-0">All the Lorem Ipsum generators on the  predefined chunks as necessary.....<a href="#" class="text-primary"> Read More</a></p>                                                                
                                        </div>
                                    </div>                                                              
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">                                
                            <div class="card-body">
                                <h5 class="header-title pb-3 mt-0">Payments</h5>
                                <div class="table-responsive">
                                   <table class="table table-hover mb-0">
                                        <thead>
                                            <tr class="align-self-center">
                                                <th>Campaign<span>Name/UID</span></th>
                                                <th>List<span>Name/UID</span></th>
                                                <th>Client<span>Name/UID</span></th>
                                                <th>Added date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($get_campaignList as $campaign) {
                                            $campaign_name = wordwrap($campaign->name, 20 , '<br/>', true);
                                            $clientName = $campaign->fname;
                                            $clientName= wordwrap($clientName, 20, "<br />\n");
                                            if(isset($campaign->lname))
                                            {
                                                $clientName.= $campaign->lname.' ';
                                            }
                                            $status='';
                                            $class='';
                                            if($campaign->campaign_status==0){
                                                $status     =   "Draft";
                                                $class      =   "badge-soft-warning";
                                            }else if($campaign->campaign_status==1){
                                                $status     =   "Pending-Sending";
                                                $class      =   "badge-soft-warning";
                                            }else if($campaign->campaign_status==2){
                                                $status     =   "Processing";
                                                $class      =   "badge-soft-warning";
                                            }
                                            else if($campaign->campaign_status==3){
                                                $status     =   "Sending";
                                                $class      =   "badge-soft-warning";
                                            }
                                            else if($campaign->campaign_status==4){
                                                $status     =   "Sent";
                                                $class      =   "badge-soft-primary";
                                            }
                                            else if($campaign->campaign_status==5){
                                                $status     =   "Pause";
                                                $class      =   "badge-soft-warning";
                                            }
                                            else if($campaign->campaign_status==7){
                                                $status     =   "Quota Exhaust";
                                                $class      =   "badge-soft-warning";
                                            }else{
                                                $status     =   "Deleted";
                                                $class      =   "badge-soft-warning";
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $campaign_name."<br/><b>".$campaign->campaign_uid."</b>"; ?></td>
                                                <td><?php echo $campaign->name."<br/><b>".$campaign->list_uid."</b>"; ?></td>
                                                <td><?php echo $clientName."<br/><b>".$campaign->client_uid."</b>"; ?></td>
                                                <td><?php echo $campaign->date_added; ?></td>
                                                <td><span class="badge badge-boxed  <?php echo $class;?>"><?php echo $status; ?></span></td>                   
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div><!--end table-responsive-->
                                <div class="pt-3 border-top text-right">
                                    <a href="#" class="text-primary">View all <i class="mdi mdi-arrow-right"></i></a>
                                </div> 
                            </div>
                        </div>                                                                   
                    </div> 
                </div>
                <!-- end row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
<script src="<?php base_url();?>/assets/plugins/chart.js/chart.min.js"></script>
<script>
//line-chart
//line-chart
var ctx = document.getElementById('lineChart').getContext('2d');

gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
   gradientStroke1.addColorStop(0, '#008cff');
   gradientStroke1.addColorStop(1, 'rgba(22, 195, 233, 0.1)');

gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
   gradientStroke2.addColorStop(0, '#ec536c');
   gradientStroke2.addColorStop(1, 'rgba(222, 15, 23, 0.1)');

   var myChart = new Chart(ctx, {
     type: 'line',

     data: {
       labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
       datasets: [{
         label: '1-Dataset',
         data: [3, 30, 10, 10, 22, 12, 5],
         pointBorderWidth: 0,
         pointHoverBackgroundColor: gradientStroke1,
         backgroundColor: gradientStroke1,
         borderColor: 'transparent',
         borderWidth: 1
       },
       {
           label: '2-Dataset',
           data: [5, 15, 12, 25, 5, 7, 5],
           pointBorderWidth:0,
           pointHoverBackgroundColor: gradientStroke2,
           backgroundColor: gradientStroke2,
           borderColor: 'transparent',
           borderWidth: 1
         }],
      
     },
     options: {
         legend: {
           position: 'bottom',
           display:true,
           labels: {
            boxWidth:12
          }
         },
         tooltips: {
           displayColors:true,
           intersect: true,
         },
         elements: {
            point:{
                radius: 3
            }
        },
         scales: {
           xAxes: [{
               ticks: {
                   max: 100,
                   min: 20,
                   stepSize: 10                        
               },
              
               ticks: {
                display: true,
                fontFamily: "'Rubik', sans-serif"
                },
               
           }],
           yAxes: [{                   
              
               ticks: {
                   display: true,
                   fontFamily: "'Rubik', sans-serif"
               },
               
           }]
       },
      }
   });
//Doughnut
var ctx = document.getElementById("dash-doughnut").getContext('2d');

gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
  gradientStroke1.addColorStop(0, '#00e795');
  gradientStroke1.addColorStop(1, '#0095e2');

gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
  gradientStroke2.addColorStop(1, '#f6d365');
  gradientStroke2.addColorStop(0, '#ff7850');

gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
  gradientStroke3.addColorStop(0, '#f56348');
  gradientStroke3.addColorStop(1, '#f81f8b');

  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["Draft", "Panding", "Sent"],
      datasets: [{
        backgroundColor: [
          gradientStroke1,
          gradientStroke2,
          gradientStroke3,
        ],
        hoverBackgroundColor: [
          gradientStroke1,
          gradientStroke2,
          gradientStroke3,
        ],
		data: [<?php echo isset($draft_campaign_count) ? $draft_campaign_count : '' ;?>, <?php echo isset($pending_campaign_count) ? $pending_campaign_count : '';?>, <?php echo isset($sent_campaign_count) ? $sent_campaign_count : '';?>],
        borderWidth: [.8, .8, .8]
      }]
    },
    options: {
        cutoutPercentage: 75,
        legend: {
          position: 'bottom',
          display: false,
          labels: {
            boxWidth:12
          }
      },          
    }
  }); 

  //Bar
  var ctx = document.getElementById("bar-data").getContext('2d');

   
 var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
     gradientStroke1.addColorStop(0, '#5ecbf6');  
     gradientStroke1.addColorStop(1, '#8d44ad'); 
 
     var cornerRadius = 20;

     var myChart = new Chart(ctx, {
       type: 'bar',        
       data: {
         labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
         datasets: [{
           label: 'Revenue',
           data: [72, 75, 72, 77, 78, 74, 71, 72, 71, 69, 72, 75],
           borderColor: gradientStroke1,
           backgroundColor: gradientStroke1,
           hoverBackgroundColor: gradientStroke1,
           pointRadius: 0,
           fill: false,
           borderWidth: 0
         },]
       },
       options: {
         
         legend: {
           position: 'bottom',
           display:false
         },
         tooltips: {
           displayColors:false,
           intersect: false,
         },
         scales: {
           xAxes: [{
               ticks: {
                   max: 100,
                   min: 20,
                   stepSize: 10                        
               },
               gridLines: {
                   display: false ,
                   color: "#FFFFFF"
               },
               ticks: {
                display: true,
                fontFamily: "'Rubik', sans-serif"
                },
               
           }],
           yAxes: [{                   
               gridLines: {
                 color: '#fff',
                 display: false ,
               },
               ticks: {
                   display: false,
                   fontFamily: "'Rubik', sans-serif"
               },
               
           }]
       },
      }
     });


</script>

