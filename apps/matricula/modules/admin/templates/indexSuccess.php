<style type="text/css">
    .item-menu {
        border:3px solid #999999;
        width:300px;
        height:100px;
        margin:15px 15px 15px 15px;
        font-size:27px;
        font-weight:bold;
        background-color:#EBEBEB;
    }
</style>
<h1 style="text-align: center">ADMIN - GDA</h1>
<br><small>sinta o poder</small><br>
<table align="center">
    <tr>
        <td>
            <a href="<?php echo url_for('admin/Matricula') ?>">
                <div align="center" class="item-menu">
                    <br>MATRÍCULA<br>
                </div>
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="<?php echo url_for('admin/Status') ?>">
                <div align="center" class="item-menu">
                    <br>ANDAMENTO<br>
                </div>
            </a>
        </td>
    </tr>
    <!--
    <tr>
        <td>
            <a href="<?php echo url_for('admin/Info') ?>">
                <div align="center" class="item-menu">
                    <br>INFORMAÇÕES<br>
                </div>
            </a>
        </td>
    </tr>
    -->
</table>
<br><br>
<!--<h3 style="text-align: center"><a href="<?php echo url_for1('main/index'); ?>">Voltar ao Menu</a></h3>-->