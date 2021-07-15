@if(count($list) == 0)
<div class="mt-4 text-center">
    <h2>Horoscope not found</h2>
</div>
@else
<div class="row mt-4">
    @foreach($list as $key => $data)
    <?php
        $numberofDays =  count($data);
        $i = 0;
    ?>
    <div class="col">
        <h4 class="text-center">{{date("F", strtotime($data[10]['year'].'-'.$data[10]['month'].'-'.$data[10]['day']))}}</h4>
        <table class="table table-bordered">
            <thead>
                <tr class="table-active">
                    <th scope="col" style="width: 14.285%;">MON</th>
                    <th scope="col" style="width: 14.285%;">TUE</th>
                    <th scope="col" style="width: 14.285%;">WED</th>
                    <th scope="col" style="width: 14.285%;">THU</th>
                    <th scope="col" style="width: 14.285%;">FRI</th>
                    <th scope="col" style="width: 14.285%;">SAT</th>
                    <th scope="col" style="width: 14.285%;">SUN</th>
                </tr>
            </thead>
            <tbody>
            @for ($i = 0; $i < 42;)
                @if($i%7 ==0)
                <tr>
                @endif
                <?php
                    $style = "opacity :";
                    if($key == $data[$i]['month']){
                        $style = $style.'1;';
                        $style .= " background-color: ".colorCodebyScore($data[$i]['score']);
                    }
                    else{
                        $style = $style.'0.4;';
                    }

                ?>
                    <td style="{{$style}}">{{$data[$i]['day']}}</td>
                @if($i%7 == 6)
                </tr>
                @endif
                <?php $i++;?>
            @endfor
            </tbody>
        </table>
    </div>
    @endforeach
</div>
@endif