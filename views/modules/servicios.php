<?php
            $usuario = $_SESSION['user'];
            //$apellido=$_SESSION['apellido'];
            ?> </div>
<!DOCTYPE html>
<html>
<body>
    <h2>REPORTES DE ESTUDIANTES</h2>
    <a href="1/index.php?action" class="easyui-linkbutton" iconCls="icon-print" plain="true" >GENERAR REPORTE ESTUDIANTES</a>
    <a href="2/index.php?action" class="easyui-linkbutton" iconCls="icon-print" plain="true" >GENERAR REPORTE DEL CURSO 1</a>
    </head>
<?php 
        
        include("models/conexion.php");
        $buscar = '';
        if (isset($_POST['bbuscar'])) {
        $buscar=$_POST["buscar"];

        $sql = "select * from estudiantes 
        where 
       
         APE_EST like '".$buscar."%'
        order by APE_EST ";

        $resultado = mysqli_query($conn, $sql);
        
        }else{
        $sql = "select * from estudiantes 
        where 
       
        APE_EST like '".$buscar."%'
        order by APE_EST ";
        $resultado = mysqli_query($conn, $sql);
        }

?>
<body>
    <h2 id="h2re">BUSCAR ESTUDIANTES</h2>
    <form action="" method="POST" id="form1">
        <div style="margin-bottom:10px">
                <input style="width:210px;height:30" placeholder="  INGRESE APELLIDO" name="buscar" >
            </div>
            <div >
                <input style="width:100px;height:30" type="submit" class="easyui-linkbutton c6" name="bbuscar" value="BUSCAR">
                <input style="width:110px;height:30" type="submit" class="easyui-linkbutton c6" name="recar" value="RECARGAR">
            </div>
    </form>
    <div style="text-align:center;">
        <table id="dg" title="" class="easyui-datagrid" style="width:700px;height:400px"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="CED_EST" width="50">CEDULA</th>
                <th field="NOM_EST" width="50">NOMBRE</th>
                <th field="APE_EST" width="50">APELLIDO</th>
                <th field="DIR_EST" width="50">DIRECCION</th>
                <th field="TEL_EST" width="50">TELEFONO</th>
                <th field="SEX_EST" width="50">SEXO</th>
                <th field="CUR_EST" width="50">CURSO</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while ($filas = mysqli_fetch_assoc($resultado)) 
                {
             ?>
            <tr>
                <td><?php echo $filas["CED_EST"]?></td>
                <td><?php echo $filas["NOM_EST"]?></td>
                <td><?php echo $filas["APE_EST"]?></td>
                <td><?php echo $filas["DIR_EST"]?></td>
                <td><?php echo $filas["TEL_EST"]?></td>
                <td><?php echo $filas["SEX_EST"]?></td>
                <td><?php echo $filas["CUR_EST"]?></td>
            </tr>
            <?php 
                }
             ?>
        </tbody>
        </table>
        </head>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">NUEVO ESTUDIANTE</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">EDITAR ESTUDIANTE</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">BORRAR ESTUDIANTE</a>
    </div>
    
    
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px" action="models/acceso.php" >
         <input type="hidden" id="op" name="op" value="insertAlumno">  
            <h3>User Information</h3>
            <div style="margin-bottom:10px">
                <input name="CED_EST" class="easyui-textbox" required="true" label="CEDULA:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="NOM_EST" class="easyui-textbox" required="true" label="NOMBRE:" style="width:100%">
            </div>  
            <div style="margin-bottom:10px">
                <input name="APE_EST" class="easyui-textbox" required="true" label="APELLIDO:" style="width:100%">
            </div>
            
            <div style="margin-bottom:10px">
                <input name="TEL_EST" class="easyui-textbox" required="true" label="TELEFONO:" style="width:100%">
            </div>
           
            <div style="margin:20px 0"></div>
    <div style="margin-bottom:20px">
            <input id="SEX_EST" class="easyui-combobox" name="SEX_EST"   style="width:100%;" data-options=
            "valueField:'sexo',
            textField: 'sexo', 
            label: 'SEXO',
            labelPosition: 'top'">
            <div style="margin:20px 0"></div>

    </div>  
    <div style="margin:20px 0"></div>
    <div style="margin-bottom:10px">
            <select  name="NUM_CUR"  id="NUM_CUR"  class="easyui-combobox" required="true" 
            label="CURSO" style="width:100%;" labelPosition="top">
          <option value="">SIN_CURSO</option>
        <?php
        $mysqli = new mysqli("sql5.freemysqlhosting.net","sql5389025","QTqXJx5nuH","sql5389025");
          $query = $mysqli -> query ("SELECT * FROM curso");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[NUM_CUR].'">'.$valores[NUM_CUR].'</option>';
          }
        ?>
        </select>
        </div>

    <div style="margin-bottom:10px">
            <select  name="DIR_EST"  id="DIR_EST"  class="easyui-combobox" required="true" 
            label="DIRECCION" style="width:100%;" labelPosition="top">
          <option value="0">SIN_DIRECCION</option>
        <?php
        $mysqli = new mysqli("sql5.freemysqlhosting.net","sql5389025","QTqXJx5nuH","sql5389025");
          $query = $mysqli -> query ("SELECT * FROM direccion");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[NOM_DIR].'">'.$valores[NOM_DIR].'</option>';
          }
        ?>
        </select>
        </div>

        </form>
    </div>
    <div id="dlg-buttons">
        <a href="#" class="easyui-linkbutton" onclick="submitForm()" style="width:80px">Guardar</a>
        <a href="#" class="easyui-linkbutton" onclick="clearForm()" style="width:80px">Limpiar</a>
    </div>

    <div id="dlgm" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="ff" method="post" novalidate style="margin:0;padding:20px 50px" action="models/acceso.php" >
         <input type="hidden" id="op" name="op" value="updateAlumno">  
            <h3>Editar Usuario</h3>
            <div style="margin-bottom:10px">
                <input name="CED_EST" class="easyui-textbox" required="true" label="CEDULA:" style="width:100%" readonly>
            </div>
            <div style="margin-bottom:10px">
                <input name="NOM_EST" class="easyui-textbox" required="true" label="NOMBRE:" style="width:100%">
            </div>    
            <div style="margin-bottom:10px">
                <input name="APE_EST" class="easyui-textbox" required="true" label="APELLIDO:" style="width:100%">
            </div> 
            <div style="margin-bottom:10px">
                <input name="TEL_EST" class="easyui-textbox" required="true" label="TELEFONO:" style="width:100%">
            </div>   
              

            <div style="margin:20px 0"></div>
    <div style="margin-bottom:20px">
            <input id="SEX_EST_ED" class="easyui-combobox" name="SEX_EST"   style="width:100%;" data-options=
            "valueField:'sexo',
            textField: 'sexo', 
            label: 'SEXO',
            labelPosition: 'top'">
    </div>  

    <div style="margin:20px 0"></div>
    <div style="margin-bottom:10px">
            <select  name="NUM_CUR"  id="NUM_CUR"  class="easyui-combobox" required="true" 
            label="CURSO" style="width:100%;" labelPosition="top">
          <option value="0">SIN_CURSO</option>
        <?php
        $mysqli = new mysqli("sql5.freemysqlhosting.net","sql5389025","QTqXJx5nuH","sql5389025");
          $query = $mysqli -> query ("SELECT * FROM curso");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[NUM_CUR].'">'.$valores[NUM_CUR].'</option>';
          }
        ?>
        </select>
        </div>

    <div style="margin-bottom:10px">
            <select  name="DIR_EST"  id="DIR_EST"  class="easyui-combobox" required="true" 
            label="DIRECCION" style="width:100%;" labelPosition="top">
          <option value="">SIN_DIRECCION</option>
        <?php
        $mysqli = new mysqli("sql5.freemysqlhosting.net","sql5389025","QTqXJx5nuH","sql5389025");
          $query = $mysqli -> query ("SELECT * FROM direccion");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[NOM_DIR].'">'.$valores[NOM_DIR].'</option>';
          }
        ?>
        </select>
        </div>



        </form>
    </div>
    <div id="dlg-buttons">
        <a href="#" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="submitFormUpdate()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgm').dialog('close')" style="width:90px">Cancel</a>
    </div>

    <script type="text/javascript">
        var url;
        function newUser(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','New User');
            $('#fm').form('load');
            url = 'save_user.php';
        }
        function submitForm(){
                $('#fm').form('submit');
                $('#fm').form({
                    success: function(data){
                        $("#dg").datagrid("reload");
                        $('#dlg').dialog('close');
                        console.log(data);
                        if(data.indexOf("Error")!=-1){
                        $.messager.alert("Error", data, "error");
                        }
                        else {
                        $.messager.alert(data);
                        }
                    }

                });
            }

        function submitFormUpdate(){
            $('#ff').form('submit');
            $('#ff').form({
                success:function(data){
                    $("#dg").datagrid("reload");
                    $('#dlgm').dialog('close');
                    console.log(data);
                    if(data.indexOf("error")!=-1){
                        $.messager.alert("error",data,"error");

                    }else{
                        $.messager.alert(data);
                    }
                }
            });
        }
        
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#dlgm').dialog('open').dialog('center').dialog('setTitle','Edit User');
                $('#ff').form('load',row);
                url = 'update_user.php?id='+row.id;
            }
        }
        
     

        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','¿Desea eliminar al estudiante?',function(r){
                    if (r){
                        $.post('models/acceso.php',{ op: "deleteAlumno",
                         CED_EST: row["CED_EST"]},function(result){
                            if (result.success){
                                $('#dg').datagrid('reload');    // reload the user data
                            } else {
                                $.messager.show({    // show error message
                                    title: 'Se borró correctamente',
                                    msg: result.errorMsg
                                });
                            }
                            $("#dg").datagrid("reload");    
                        },'json');
                    }
                });
            }
        }



    </script>
   <script>
        $(document).ready(function(){
            $('#SEX_EST').combobox("reload","views/sexo.json");
            $('#SEX_EST_ED').combobox("reload","views/sexo.json");
            $('#CUR_EST').combobox("reload","views/curso.json");
            $('#CUR_EST_ED').combobox("reload","views/curso.json");
        });
    </script>
</body>
</html>