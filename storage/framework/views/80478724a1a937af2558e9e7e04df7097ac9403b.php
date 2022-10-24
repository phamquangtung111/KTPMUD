<?php $__env->startSection('content-admin'); ?>
    <?php
    $user = Auth::user();
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <div id="body-admin">
        <div>
            <div style="padding-top:15px">
                <h1 style="color: #103D8F; text-align: center">
                    Sapo Technology
                </h1>
            </div>

            <div style="height:25px"></div>
            <form  id="month" method="get">
                <div style="display: flex; margin-bottom: 20px; margin-top: 20px">
                    <div style="display: flex;">
                        <label style="margin-right: 20px" >Tháng</label>
                        <select class="form-control input-sm" style="width: 60px" name="month" id="month_select" form="month">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div style="display: flex; margin-left: 30px">
                        <label style="margin-right: 20px" >Năm</label>
                        <select class="form-control input-sm" style="width: 100px" name="year" id="year_select" form="month">
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                        </select>
                    </div>
                    <button style="margin-left: 20px" class="btn btn-outline-success" type="submit">Search</button>

                </div>
            </form>
            <table class="table table-striped custom-table mb-0">
                <thead>
                <tr>
                    <th>Thành Viên</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th>15</th>
                    <th>16</th>
                    <th>17</th>
                    <th>18</th>
                    <th>19</th>
                    <th>20</th>
                    <th>22</th>
                    <th>23</th>
                    <th>24</th>
                    <th>25</th>
                    <th>26</th>
                    <th>27</th>
                    <th>28</th>
                    <th>29</th>
                    <th>30</th>
                    <th>31</th>
                </tr>
                </thead>
                <tbody>
                <script>
                    var chart_members = []
                </script>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="<?php echo e($item->id); ?>">
                </tr>
                <script>
                    var check = 0;
                    var count = []
                    var first = []
                    var last = []
                    var new_id = []
                    var date_checkin = []
                    var id = "<?php echo e($item->id); ?>"
                    var tr = document.getElementById(id)
                    var name = "<?php echo e($item->tennv); ?>"
                    var url = "/admin/employee/edit_employee/" + id
                    tr.insertAdjacentHTML('beforeend', '<td><a href="'+url+'">'+ name +'</a></td>')
                </script>
                    <?php $__currentLoopData = $checkin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($val->macheckin == $item->id): ?>
                            <script>
                                var tmp = "<?php echo e($val->date); ?>".split('/')[0]
                                new_id[tmp] = "<?php echo e($val->macheckin); ?>"
                                date_checkin[tmp] ="<?php echo e($val->date); ?>"
                                first[tmp] = "<?php echo e($val->checkin_time); ?>"
                                last[tmp] = "<?php echo e($val->checkout_time == null ? 1 : 2); ?>"
                                check++
                            </script>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <script>
                    chart_members.push(["<?php echo e($item->tennv); ?>", check])
                </script>
                <script>
                    var month2 = window.location.search;
                    var urlParams = new URLSearchParams(month2);
                    var result = urlParams.get('month')
                    var result2 = urlParams.get('year')
                    for(var i = 1; i < 31; i++){
                        if(date_checkin[i] != null){
                            this_date = new Date()
                            day = parseInt(date_checkin[i].split('/')[0])
                            month = parseInt(date_checkin[i].split('/')[1])
                            year = parseInt(date_checkin[i].split('/')[2])
                            if(result == undefined){
                                this_month = this_date.getMonth() + 1
                                document.getElementById('month_select').value = this_month
                            }else{
                                this_month = result
                                document.getElementById('month_select').value = this_month

                            }
                            if(result2 == undefined){
                                this_year = this_date.getFullYear()
                                document.getElementById('year_select').value = this_year

                            }else{
                                this_year = result2
                                document.getElementById('year_select').value = this_year

                            }
                            if( day == i && month == this_month && year == this_year){
                                if(last[i] != 1){
                                    tr.insertAdjacentHTML('beforeend', '<td><div><i  class="fa fa-check text-success"></i></div><div><i class="fa fa-check text-success"></i></div></td>')
                                }else{
                                    tr.insertAdjacentHTML('beforeend', '<td><div><i class="fa fa-check text-success"></i></div><div><i class="fa fa-times text-danger"></i></div></td>')
                                }

                            }else{
                                tr.insertAdjacentHTML('beforeend', '<td><div><i class="fa fa-times text-danger"></i></div><div><i class="fa fa-times text-danger"></i></div></td>')
                            }
                        }else{
                            tr.insertAdjacentHTML('beforeend', '<td><div><i class="fa fa-times text-danger"></i></div><div><i class="fa fa-times text-danger"></i></div></td>')
                        }
                    }
                </script>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <script type="text/javascript">
            // Load Charts and the corechart and barchart packages.
            google.charts.load('current', {'packages':['corechart']});

            // Draw the pie chart and bar chart when Charts is loaded.
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Thành Viên');
                data.addColumn('number', 'Số lượng');
                data.addRows(chart_members);
                console.log(chart_members)
                var barchart_options = {title:'Thống Kê chấm công (Toàn thời gian)',
                    width:1300,
                    height:800,
                    legend: 'none'};
                var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
                barchart.draw(data, barchart_options);
            }
        </script>
        <table class="columns">
            <tr>
                <td><div id="barchart_div" style="border: 1px solid #ccc"></div></td>
            </tr>
        </table>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/techasians/resources/views/admin/manage/timekeeping.blade.php ENDPATH**/ ?>