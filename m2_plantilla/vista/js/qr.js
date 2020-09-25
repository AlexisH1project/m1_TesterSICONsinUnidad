 function escaner(val) {

        // alert(curp)
        // scanner.stop(cameras[0]);
         document.getElementById("preview").style.visibility = "visible"; 
        let scanner = new Instascan.Scanner(
        {
            video: document.getElementById('preview')
        }
        );

        scanner.addListener('scan', function(content) {
            alert('Contenido escaneado: ' + content);
            
            cameras = Instascan.Camera.getCameras()
            scanner.stop(cameras[0]);
            document.getElementById("preview").style.visibility = "hidden"; 

            contenido = content.split('|');
            if(val == 'curp'){

                document.getElementById("curp").value = contenido[0];
                document.getElementById("ap_pat").value = contenido[2];
                document.getElementById("ap_mat").value = contenido[3];
                document.getElementById("nombre_s").value = contenido[4];
                document.getElementById("gen").value = contenido[5];
                document.getElementById("nac").value = contenido[7];

                document.getElementById("curp").contentEditable = "false";
                document.getElementById("ap_pat").contentEditable = "false";
                document.getElementById("ap_mat").contentEditable = "false";
                document.getElementById("nombre_s").contentEditable = "false";
                document.getElementById("gen").contentEditable = "false";
                document.getElementById("nac").contentEditable = "false";


            }else{
                // alert(contenido[0])
                document.getElementById("fili").value = contenido[0].substr(contenido[0].length-13,contenido[0].length-1);

                document.getElementById("fili").contentEditable = "false";

            }

        });

        Instascan.Camera.getCameras().then(cameras => 
        {
            if(cameras.length > 0){
                scanner.start(cameras[0]);
            } else {
                alert("No se encuentra camara");
                console.error("No existe camara o dispositivo!");
            }
        });
    }