<div class="backbanner"></div>
<div class="page">
    <div class="page_login" >
        <h2>Silahkan Login</h2>
        <table>
            <?php echo form_open('member/login'); ?> 
                <tr>
                    <td id="text_">NIP</td>
                    <td><input id="form_inp" type="text" name="user" value="" /></td>
                </tr>
                <tr>
                    <td id="text_">Password</td>
                    <td><input id="form_inp" type="password" name="pass" value="" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input id="form_but" type="submit" value="Login"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo validation_errors(); ?><?php echo $ket; ?></td>
                </tr>
            <?php echo form_close(); ?> 
        </table>
</div>
</div>

<style>
    
    h2{
        text-align: center;
        padding-top: 30px;
    }
    
    table{
        margin-left: 50px;
    } 
    
    table tr td{
        height: 50px;
    }
    
    #text_{
        width: 150px;
    }
    
    #form_inp {
        width: 230px;
        height: 25px;
        font-size: 18px;
    }
    
    #form_but{
        width: 100px;
        padding: 5px;
        padding-left: 10px;
        padding-right: 10px;
        cursor: pointer;
    }
    
</style>