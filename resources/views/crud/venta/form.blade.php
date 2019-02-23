            <div class="form-group">
                {!!Form::label('cantidad','Cantidad de Unidades:',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::text('cantidad',null,['class'=>'form-control','placeholder'=>'Ej: 10','required'])!!}
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                {!!Form::label('precio','Precio Bs:',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    {!!Form::text('precio',null,['class'=>'form-control','placeholder'=>'Ej: 10','required'])!!}
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                {!!Form::label('fecha','Fecha de Venta',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-8">
                    {!!Form::date('fecha',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'Seleccione una Fecha','required'])!!}
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                {!!Form::label('id_producto','Producto',['class'=>'col-sm-2 control-label'])!!}
                <div class="col-sm-4">
                    @if($productos->count()==0)
                        <h4 style="color:red"><strong>* No hay Productos Registrados</strong></h4>
                    @endif
                    {!!Form::select('id_producto',$productos, null, ['class'=>'form-control','placeholder' => 'Seleccione el Producto...','id'=>'id_producto']);!!}
                </div>
            </div>
            <div id="line" class="hr-line-dashed"></div>