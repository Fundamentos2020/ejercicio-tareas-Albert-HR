
function cargarTrs(vlu){
    // Conectar con ajax
    // Iniciar XMLHTTPRequest
    const xhr = new XMLHttpRequest();
    
    
    // Abrimos la conexion
    let url = `http://localhost/Consultas/Controllers/tareasController.php?key=${vlu}`;
    xhr.open('GET', url, true);




    //Datos e impresion del template
    xhr.onload = function() {
        if(this.status === 200) {

            const Tars = JSON.parse( this.responseText ) ;

            if(Tars != null){
                // // Generar el HTML
                let htmlTrs = '';
                // Imprimir cada img
                Tars.forEach(function(tr) {

                    // Iniciar XMLHTTPRequest
                    const xhrt = new XMLHttpRequest();                
                    // Abrimos la conexion
                    let urlc = `http://localhost/Consultas/Controllers/categoriasController.php?key=${tr[5]}`;
                    xhrt.open('GET', urlc, true);
                    //Datos e impresion del template
                    xhrt.onload = function() {
                        if(this.status === 200) {
                            const Cats = JSON.parse( this.responseText);
                            Cats.forEach(function(tp) {
                                
                                if(tr[3] != null){
                        
                                    htmlTrs += `
                                    <div style="margin: 1em; border-top: 1px solid lightslategray" class="row">
                
                
                                    <div class=" col-m-6 col-s-6 nomT">${tr[1]}</div>
                    
                                    <div class="col-m-6 col-s-6 row" >
                                        <div class=" col-s-12 col-m-12 FAC">${tp[0]} - ${tr[3]}</div>
                                    </div>
                    
                                    <div class=" col-m-12 col-s-12 cuerpoT">
                                        ${tr[2]}
                                    </div>
                    
                                    </div>
                                    `;
                                    
                                }else{
                                    htmlTrs += `
                                    <div style="margin: 1em; border-top: 1px solid lightslategray" class="row">
                
                
                                    <div class=" col-m-6 col-s-6 nomT">${tr[1]}</div>
                    
                                    <div class="col-m-6 col-s-6 row" >
                                        <div class=" col-s-12 col-m-12 FAC">${tp[0]}</div>
                                    </div>
                    
                                    <div class=" col-m-12 col-s-12 cuerpoT">
                                        ${tr[2]}
                                    </div>
                    
                                    </div>
                                    `;
                                    
                                }
                                document.getElementById('trs').innerHTML = htmlTrs;
                            })
                        }
                    }
                    xhrt.send();
                })
            }else{
                let htmlTrs = '';
                htmlTrs += `
                            <div class=" col-m-6 col-s-6 nomT">No hay tareas de esta categoria</div>
                            `;
                document.getElementById('trs').innerHTML = htmlTrs;
            }
            
            
        }
    }
    xhr.send();
}



function cargarCatgr(){
    // Conectar con ajax
    // Iniciar XMLHTTPRequest
    const xhr = new XMLHttpRequest();
    
    
    // Abrimos la conexion
    xhr.open('GET', 'http://localhost/Consultas/Controllers/categoriasController.php?key=null', true);




    //Datos e impresion del template
    xhr.onload = function() {
        if(this.status === 200) {
            

            const Cats = JSON.parse( this.responseText ) ;
                        
            let types = '';

            types += `
                <option value="TODAS" selected>TODAS</option>
                `;

            //Recorrer
            Cats.forEach(function(tp) {
                    types += `
                        <option value="${tp[0]}">${tp[1]}</option>
                    `;
            })

            document.getElementById('ctgr').innerHTML = types;
            
        }
    }
    xhr.send();
    cargarTrs("TODAS");
}