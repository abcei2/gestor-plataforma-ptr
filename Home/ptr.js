  

    $.getJSON("file1.json", function(result){
        console.log(result["HOUR_ON"]+":"+result["MIN_ON"]);
        document.getElementById("on_time").value=result["HOUR_ON"]+":"+result["MIN_ON"]
        document.getElementById("off_time").value=result["HOUR_OFF"]+":"+result["MIN_OFF"]
        
        $("#off_time").value=result["HOUR_OFF"]+":"+result["MIN_OFF"]
    });

    $("#enviar").click(function(){
        var tiempo1 = $("#tiempo1").val();
        var tiempo2 = $("#tiempo2").val();
        var tiempo3 = $("#tiempo3").val();
        var tiempo4 = $("#tiempo4").val();
        var texto1 = $("#texto1").val();
        var texto2 = $("#texto2").val();
        var texto3 = $("#texto3").val();
        var texto4 = $("#texto4").val();
        console.log(tiempo1,tiempo2,tiempo3,tiempo4,texto1,texto2,texto3,texto4);
        $.getJSON("file1.json", function(result){
//            console.log(result);
//            var i;
            result["Company List"][0]["text1"]=tiempo1;
            result["Company List"][1]["text1"]=tiempo2;
            result["Company List"][2]["text1"]=tiempo3;
            result["Company List"][3]["text1"]=tiempo4;

            result["Company List"][0]["text"]=texto1;
            result["Company List"][1]["text"]=texto2;
            result["Company List"][2]["text"]=texto3;
            result["Company List"][3]["text"]=texto4;
            result["FROM_URL"]="FALSE";
            console.log(result);
            var resultado= result;
            $.ajax({
                type: "POST",
                url: "guardar.php",
                data: {datoj:resultado},
                success: function(data){
                    alert(data);
                },
                error: function(data){
                    alert(data);
                }
            });
        });
//        console.log(tiempo1);
    });

    var good_ip=false;
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
                    data1=JSON.parse(data1)
                    data1=data1.data
                    if(data1 && data1 !=""){
                        if(Array.isArray(data1)){
                            good_ip=true
                            alert("GOOD PING, CAN CONFIG")
                            data_temp=data1
                        }else{
                            good_ip=false
                            alert("BAD PING, CAN'T CONFIG")
                        }                        
                    }else{                        
                        good_ip=false
                        alert("BAD PING, CAN'T CONFIG")
                    }
                }
                catch (err){
                    alert("BAD PING, CAN'T CONFIG")
                    good_ip=false
                }                
                
            },
            error: function(data1){
                console.log(data1);
                alert("BAD PING, CAN'T CONFIG")
                good_ip=false
            },
            timeout: 3000, // sets timeout to 3 seconds
        });
    });

    $("#set_time_button").click(function(){
        ON_TIME = $("#on_time").val();
        OFF_TIME = $("#off_time").val();    
        if(ON_TIME && OFF_TIME)
        {
            console.log("NOT EMPTY")
            arr=ON_TIME.split(":")
            HOUR_ON=arr[0]
            MIN_ON=arr[1]
            
            arr=OFF_TIME.split(":")
            HOUR_OFF=arr[0]
            MIN_OFF=arr[1]

            console.log(HOUR_ON,MIN_ON)
            console.log(HOUR_OFF,MIN_OFF)
            $.getJSON("file1.json", function(result){
                result["HOUR_ON"]=HOUR_ON;
                result["MIN_ON"]=MIN_ON;
                result["HOUR_OFF"]=HOUR_OFF;
                result["MIN_OFF"]=MIN_OFF;
                var resultado= result;
                console.log("result")

                $.ajax({
                    type: "POST",
                    url: "guardar.php",
                    data: {datoj:resultado},
                    success: function(data){
                        alert(data);
                    },
                    error: function(data){
                        alert(data);
                    }
                });
            });
        }else{
            alert("PLEASE CONFIGURE BOTH ON AND OFF TIME")
        }
    })
    $("#configurar").click(function(){
        if(good_ip){
            $.getJSON("file1.json", function(result){
                result["FROM_URL"]="TRUE";
                result["URL_SERVICE"]=ping_url;
                var resultado= result;
                console.log("result")

                $.ajax({
                    type: "POST",
                    url: "guardar.php",
                    data: {datoj:resultado},
                    success: function(data){
                        alert(data);
                    },
                    error: function(data){
                        alert(data);
                    }
                });
            });
        }else{

            alert("BAD PING, CAN'T CONFIG")
        }
        
    });