

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 

<script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
<meta charset="UTF-8">
<?php

$lvlroot = "../";

include_once($lvlroot . "Body/Head.php");
// Including Begin Header.
include_once($lvlroot . "Body/BeginPage.php");
//
// Including Side bar.
include_once($lvlroot . "Body/SideBar.php");
// Including Php database.
// function defined in js/autocomplete.js
?> 
<div class="row">
    
    <div class="col-md-12">

        <div class="col-md-2">
            
        </div>

        <div class="col-md-8">

            <div class="col-md-6 text-center">
                <label>tiempo 1</label>
                <input id="tiempo1" type="text" value="" style="width: 50px;">
                <label>texto</label>
                <input id="texto1" type="text" value="">
            </div>

            <div class="col-md-6 text-center">
                <label>tiempo 2</label>
                <input id="tiempo2" type="text" value="" style="width: 50px;">
                <label>texto</label>
                <input id="texto2" type="text" value="">
            </div>

        </div>

    </div>
    <div class="col-md-12">

        <div class="col-md-2">
            
        </div>

        <div class="col-md-8">

            <div class="col-md-6 text-center">
                <label>tiempo 3</label>
                <input id="tiempo3" type="text" value="" style="width: 50px;">
                <label>texto</label>
                <input id="texto3" type="text" value="">
            </div>

            <div class="col-md-6 text-center">
                <label>tiempo 4</label>
                <input id="tiempo4" type="text" value="s" style="width: 50px;">
                <label>texto</label>
                <input id="texto4" type="text" value="">
            </div>

        </div>
    </div>
    <div class="col-md-12 text-center">
        <button id="enviar">Enviar</button>
    </div>
    <div class="col-md-12 text-center">
        <label>URL</label>
        <input id="ping_url" type="text" value="http://181.129.51.43:9094/tpm_medellin/reports/tpm_mirror/G62_CASMED_0616" style="width: 250px;">
        <button id="ping">Ping</button>
        <button id="configurar">Automático</button>
    </div>
    <!-- <div class="col-md-12 text-center">
        <label>URL</label>
        <input id="on_time" type="time" >
        <input id="off_time" type="time" >
        <button id="set_time_button">Set Time</button>
    </div> -->

    <script >
        
        console.log("hello", $("#on_time").val())
        var FROM_URL="FALSE";
        var GOOD_PING=false
        $.ajax({
            type: "POST",
            url: "load_json.php",
            success: function(data){
                result=JSON.parse(data)
                console.log(result["Company List"][1]["text1"])

                FROM_URL=result["FROM_URL"]
                GOOD_PING=result["GOOD_PING"]
                if(FROM_URL!="FALSE" && GOOD_PING!="FALSE"){
                    $("#configurar").html("Manual");
                }else{
                    $("#configurar").html("Automatico");
                }
                $("#on_time").val(result["HOUR_ON"]+":"+result["MIN_ON"]);

                $("#on_time").val(result["HOUR_ON"]+":"+result["MIN_ON"]);
                $("#off_time").val(result["HOUR_OFF"]+":"+result["MIN_OFF"]);

                $("#tiempo1").val(result["Company List"][0]["text1"]);
                $("#tiempo2").val(result["Company List"][1]["text1"]);
                $("#tiempo3").val(result["Company List"][2]["text1"]);
                $("#tiempo4").val(result["Company List"][3]["text1"]);

                $("#texto1").val(result["Company List"][0]["text"]);
                $("#texto2").val(result["Company List"][1]["text"]);
                $("#texto3").val(result["Company List"][2]["text"]);
                $("#texto4").val(result["Company List"][3]["text"]);
            },
            error: function(data){
                alert("Can't read json");
            }
        });


        $("#enviar").click(function(){

            console.log("hello", $("#on_time").val())
            var tiempo1 = $("#tiempo1").val();
            var tiempo2 = $("#tiempo2").val();
            var tiempo3 = $("#tiempo3").val();
            var tiempo4 = $("#tiempo4").val();
            var texto1 = $("#texto1").val();
            var texto2 = $("#texto2").val();
            var texto3 = $("#texto3").val();
            var texto4 = $("#texto4").val();
            
            FROM_URL="FALSE";
            $("#configurar").html("Automatico");  
            console.log(tiempo1,tiempo2,tiempo3,tiempo4,texto1,texto2,texto3,texto4);
            $.ajax({
                type: "POST",
                url: "load_json.php",
                success: function(data){
                    result=JSON.parse(data)
            //            var i;

                    result["FROM_URL"]=FROM_URL;

                    result["Company List"][0]["text1"]=tiempo1;
                    result["Company List"][1]["text1"]=tiempo2;
                    result["Company List"][2]["text1"]=tiempo3;
                    result["Company List"][3]["text1"]=tiempo4;

                    result["Company List"][0]["text"]=texto1;
                    result["Company List"][1]["text"]=texto2;
                    result["Company List"][2]["text"]=texto3;
                    result["Company List"][3]["text"]=texto4;
                    result["FROM_URL"]="FALSE";
                    $.ajax({
                        type: "POST",
                        url: "guardar.php",
                        data: {datoj:result},
                        success: function(data){
                            alert(data);
                        },
                        error: function(data){
                            alert(data);
                        }
                    });
                },
                error: function(data){
                    alert("Can't read json");
                }
            });
        });
        $("#set_time_button").click(function(){
            var on_time = $("#on_time").val();
            var off_time = $("#off_time").val();
            let on_splited = on_time.split(":");
            let off_splited = off_time.split(":");

            var hour_on = on_splited[0]
            var min_on = on_splited[1]

            var hour_off = off_splited[0]
            var min_off = off_splited[1]

            $.ajax({
                type: "POST",
                url: "load_json.php",
                success: function(data){
                    result["HOUR_ON"]=hour_on;
                    result["MIN_ON"]= min_on;
                    result["HOUR_OFF"]= hour_off;
                    result["MIN_OFF"]= min_off;
                    $.ajax({
                        type: "POST",
                        url: "guardar.php",
                        data: {datoj:result},
                        success: function(data){
                            alert("Tiempo de encendido y apagado modificado exitosamente");
                        },
                        error: function(data){
                            alert("T");
                        }
                    });
                },
                error: function(data){
                    alert("Can't read json");
                }
            });            
        });


        var good_ip="FALSE";
        var data_temp="";
        var ping_url ="";
        $("#ping").click(function(){
            ping_url = $("#ping_url").val();
            console.log(ping_url)
            
            $.ajax({
                type: "POST",
                
                url: "call_service.php",
                data: {"URL":ping_url},
                success: function(data1){
                    try{

                        data1=JSON.parse("{"+data1)

                        data1=data1.array
                        if(data1 && data1 !=""){
                            if(Array.isArray(data1)){
                                GOOD_PING="TRUE"
                                alert("GOOD PING, CAN CONFIG")
                                data_temp=data1
                                        
                            }else{
                                GOOD_PING="FALSE"
                                alert("BAD PING, CAN'T CONFIG")
                            }                        
                        }else{                        
                            GOOD_PING="FALSE"
                            alert("BAD PING, CAN'T CONFIG")
                        }
                    }
                    catch (err){
                        console.log(data1)
                        alert("BAD PING, CAN'T CONFIG")
                        GOOD_PING="FALSE"
                    }                
                    
                },
                error: function(data1){
                    console.log(data1);
                    alert("BAD PING, CAN'T CONFIG")
                    GOOD_PING="FALSE"
                },
                timeout: 3000, // sets timeout to 3 seconds
            });
            console.log(GOOD_PING)
            if(GOOD_PING=="FALSE"){
                FROM_URL="FALSE"
                $("#configurar").html("Automatico");  
            }
            $.ajax({
                type: "POST",
                url: "load_json.php",
                success: function(data){
                    result["GOOD_PING"]=GOOD_PING;
                    result["FROM_URL"]=FROM_URL;
                    result["URL_SERVICE"]=ping_url;
                    $.ajax({
                        type: "POST",
                        url: "guardar.php",
                        data: {datoj:result},
                        success: function(data){
                        },
                        error: function(data){
                            
                        }
                    });
                },
                error: function(data){
                    alert("Can't read json");
                }
            });  
        });

        $("#configurar").click(function(){
            var ping_url = $("#ping_url").val();
            console.log($("#configurar").html())
         
            if(GOOD_PING!="FALSE"){
                if(FROM_URL=="FALSE" ){            
                    $("#configurar").html("Manual");    
                    alert("Configurado de manera Automatica!") 
                    FROM_URL="TRUE"        

                }else{
                    $("#configurar").html("Automatica");
                    alert("Configurado de manera Manual!")
                    FROM_URL="FALSE"        
                }
            }else{
                FROM_URL="FALSE"
                $("#configurar").html("Automatico");  
                alert("Verifique que el servicio es correcto con el botón PING")
            }
            
            $.ajax({
                type: "POST",
                url: "load_json.php",
                success: function(data){    
                    result["FROM_URL"]=FROM_URL;
                    $.ajax({
                        type: "POST",
                        url: "guardar.php",
                        data: {datoj:result},
                        success: function(data){
                        },
                        error: function(data){
                            
                        }
                    });
                },
                error: function(data){
                    alert("Can't read json");
                }
            });  
            
            
        });
    </script> 
    

<?php
include_once($lvlroot . "Body/AlertsWindows.php");
?>
</div>

<?php
    // Including Js actions, put in the end.
    include_once($lvlroot . "Body/JsFoot.php");
    // Including End Header.
    include_once($lvlroot . "Body/EndPage.php");
?>

