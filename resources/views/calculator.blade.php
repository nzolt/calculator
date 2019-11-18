@extends('index')
@section('content')
    <form class="needs-validation" novalidate>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationCustom01">Value A</label>
                <input type="text" class="form-control" name="valueA" required>
                <div class="invalid-feedback">
                    Please input value!
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Operator</label>
                <select id="operator" name="operator" class="form-control">
                    <option value="x" selected>Operator</option>
                    <option value="add">+</option>
                    <option value="sub">-</option>
                    <option value="mul">*</option>
                    <option value="div">/</option>
                    <option value="and">AND</option>
                    <option value="or">OR</option>
                    <option value="xor">XOR</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustomUsername">Value B</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="valueB" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Please input value!
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body" style="color: #636b6f">
                <h5 class="card-title">Result</h5>
                <p class="card-text" id="result" style="color: black;">Result</p>
            </div>
        </div>
        <button class="btn btn-primary btn-submit" style="margin-top: 30px;">Submit form</button>
    </form>


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".btn-submit").click(function(e){
            e.preventDefault();
            var valuea = $("input[name=valueA]").val();
            //var v = $("#yourid").val();
            //$("#yourid option[value="+v+"]").text()
            var operator = $("#operator option:selected").val();
            var valueb = $("input[name=valueB]").val();
            $.ajax({
                type:'POST',
                url:'/form',
                data:{valuea:valuea, operator:operator, valueb:valueb},
                success:function(data){
                    $("#result").html(data);
                }
            });
        });

    </script>
@stop
