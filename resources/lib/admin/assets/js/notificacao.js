// ATENÇÃO AO ADMIN: O BANNER EXPIRA DE ACORDO COM A DATA E HORA EM QUE FOI CADASTRADO E DEIXA DE SER EXIBIDO NO FRONT.
// ATENÇÃO A BARRA DE NOTIFICAÇÃO NO ADMIN: FICARÁ EM VERMELHO OS BANNERS QUE ESTÃO EXPIRADOS DE ACORDO COM A DATA E NÃO A HORA
// MOTIVO: A IMPLEMENTAÇÃO FOI FEITA COM O OBJETO DATA DO PHP E DO JAVASCRIPT. AMBOS OBJETOS TEM O COMPORTAMENTO DIFERENTE.

jQuery(function($) {
    $(document).ready(function() {
       
        // EVENT CLICK HIDDEN BAR NOTIFICATION
        function clickCloseNotification() {

            $('.barNotification__close').on('click',function(e) {

                $('.barNotification').toggle(function() {
                    $(this).css({
                        'display':'none'
                    });
                });
            });

        }
    
        // NOTIFICA NO MENU
        function notificaMenu(posts_validos,posts_expiram,posts_expirados) {
            var valido = posts_validos;
            var expiram = posts_expiram;
            var expirado = posts_expirados;
            var html = '';
                html += '<span class="update-plugins validos-banners"><span class="plugin-count">'+valido.length+'</span></span>';
                html += '<span class="update-plugins expirando-banners"><span class="plugin-count">'+expiram.length+'</span></span>';
                html += '<span class="update-plugins expirado-banners"><span class="plugin-count">'+expirado.length+'</span></span>';
            
            $('#menu-posts-banner').find('.wp-menu-name').append(html);
        }


        // CREATE BAR NOTIFICATION
        function createBar(posts_validos,posts_expirados,posts_expiram) {

            var validos   = posts_validos; 
            var expirados = posts_expirados; 
            var expiram   = posts_expiram; 
            var html      = '';

            html += '<div class="barNotification" style="display:none">';
                html += '<div class="barNotification__close">X</div>';
            
                html += '<div class="barNotification-status">';
                    html += '<div class="barNotification-status__validos">';
                        html += '<span class="barNotification-status__green"></span><h4 class="barNotification-status__title">Válidos</h4>';
                    html += '</div>';
                     html += '<div class="barNotification-status__expirando">';
                         html += '<span class="barNotification-status__yellow"></span><h4 class="barNotification-status__title">Expirando</h4>';
                     html += '</div>';
                    html += '<div class="barNotification-status__expirados">';
                        html += '<span class="barNotification-status__red"></span><h4 class="barNotification-status__title">Expirados</h4>';
                    html += '</div>';
                html += '</div>';
                    
                html += '<hr class="barNotification__bar">';

                html += '<div class="barNotification-all">';
                    html += '<header class="barNotification-all__head">';
                        html += '<h2 class="barNotification-all__title"><p class="barNotification-all__text"><span class="barNotification-all__total">Total</span><span class="barNotification-all__qtd barNotification-all__qtd--validos">'+validos.length+'</span></p>Válidos</h2>';
                    html += '</header>';
                    html += '<ul class="barNotification-all__list">';
                                
                                for(var i = 0; i < validos.length; i++){
                    
                                    html += '<li class="barNotification-all__list-item barNotification-all__list-item--validos"><h4 class="barNotification-all__list-postname">' + validos[i] + '</h4></li>';
                                } 

                    html += '</ul>';

                    html += '<hr class="barNotification__bar">';

                    html += '<header class="barNotification-all__head">';
                        html += '<h2 class="barNotification-all__title"><p class="barNotification-all__text"><span class="barNotification-all__total">Total</span><span class="barNotification-all__qtd barNotification-all__qtd--expirando">'+expiram.length+'</span></p>Expirando</h2>';
                    html += '</header>';
                    html += '<ul class="barNotification-all__list">';
                                
                                for(var j = 0; j < expiram.length; j++){
                    
                                    html += '<li class="barNotification-all__list-item barNotification-all__list-item--expirando"><h4 class="barNotification-all__list-postname">' + expiram[j] + '</h4></li>';
                                } 

                    html += '</ul>';

                    html += '<hr class="barNotification__bar">';

                    html += '<header class="barNotification-all__head">';
                        html += '<h2 class="barNotification-all__title"><p class="barNotification-all__text"><span class="barNotification-all__total">Total</span><span class="barNotification-all__qtd barNotification-all__qtd--expirado">'+expirados.length+'</span></p>Expirados</h2>';
                    html += '</header>';
                    html += '<ul class="barNotification-all__list">';
                                
                                for(var k = 0; k < expirados.length; k++){
                    
                                    html += '<li class="barNotification-all__list-item barNotification-all__list-item--expirados"><h4 class="barNotification-all__list-postname">' + expirados[k] + '</h4></li>';
                                } 

                    html += '</ul>';
                html += '</div>';
            html += '</div>';
            
            $('#wpcontent').append(html);
            clickCloseNotification();
        } 


        // EVENT CLICK COLUMN EXPIRACAO
        function eventClickExpiracaoColumn() {

            $('#banner_expiracao').on('click',function(e) {
                e.preventDefault();
                
                // show bar notification
                $('.barNotification').toggle(function() {
                    $(this).css({
                        'background':'rgb(255 255 255 / 93%)',
                        'position':'absolute',
                        'height':'100%',
                        'width':'100%',
                        'max-width':'300px',
                        'padding':'15px',
                        'top':'0',
                        'right':'0'
                    });
                });

            })

        } eventClickExpiracaoColumn();


        // RETORNA A DATA ATUAL
        function getDataToday() {
            
            var data_new = new Date();
            var dia  = data_new.getDate().toString();
            var diaF = ( dia.length == 1 ) ? '0' + dia : dia; // 09
            var mes  = ( data_new.getMonth() + 1 ).toString();
            var mesF = ( mes.length == 1 ) ? '0' + mes : mes; // 02
            var ano  = data_new.getFullYear().toString();
            var data_current = ano+'-'+mesF+'-'+diaF; // data atual
            return data_current;

        }


        // RETORNA A DATA CADASTRADA - 7 DIAS PARA NOTIFICAR QUE IRÁ EXPIRAR
        function dataExpiration7(data) {
            
            var objData = new Date(data);
        
            objData.setDate(objData.getDate() - 7); // data atual - 7 dias
    
            var dia  = objData.getDate().toString();
            var diaF = ( dia.length == 1 ) ? '0' + dia : dia; // 09
            var mes  = ( objData.getMonth() + 1 ).toString();
            var mesF = ( mes.length == 1 ) ? '0' + mes : mes; // 02
            var ano  = objData.getFullYear().toString();
    
            var date_notification = ano+'-'+mesF+'-'+diaF; // data de expiração do banner - 7 dias

            return date_notification;
        }

        function dataExpiration6(data) {
            
            var objData = new Date(data);
        
            objData.setDate(objData.getDate() - 6); // data atual - 7 dias
    
            var dia  = objData.getDate().toString();
            var diaF = ( dia.length == 1 ) ? '0' + dia : dia; // 09
            var mes  = ( objData.getMonth() + 1 ).toString();
            var mesF = ( mes.length == 1 ) ? '0' + mes : mes; // 02
            var ano  = objData.getFullYear().toString();
    
            var date_notification = ano+'-'+mesF+'-'+diaF; // data de expiração do banner - 7 dias

            return date_notification;
        }

        function dataExpiration5(data) {
            
            var objData = new Date(data);
        
            objData.setDate(objData.getDate() - 5); // data atual - 7 dias
    
            var dia  = objData.getDate().toString();
            var diaF = ( dia.length == 1 ) ? '0' + dia : dia; // 09
            var mes  = ( objData.getMonth() + 1 ).toString();
            var mesF = ( mes.length == 1 ) ? '0' + mes : mes; // 02
            var ano  = objData.getFullYear().toString();
    
            var date_notification = ano+'-'+mesF+'-'+diaF; // data de expiração do banner - 7 dias

            return date_notification;
        }

        function dataExpiration4(data) {
            
            var objData = new Date(data);
        
            objData.setDate(objData.getDate() - 4); // data atual - 7 dias
    
            var dia  = objData.getDate().toString();
            var diaF = ( dia.length == 1 ) ? '0' + dia : dia; // 09
            var mes  = ( objData.getMonth() + 1 ).toString();
            var mesF = ( mes.length == 1 ) ? '0' + mes : mes; // 02
            var ano  = objData.getFullYear().toString();
    
            var date_notification = ano+'-'+mesF+'-'+diaF; // data de expiração do banner - 7 dias

            return date_notification;
        }

        function dataExpiration3(data) {
            
            var objData = new Date(data);
        
            objData.setDate(objData.getDate() - 3); // data atual - 7 dias
    
            var dia  = objData.getDate().toString();
            var diaF = ( dia.length == 1 ) ? '0' + dia : dia; // 09
            var mes  = ( objData.getMonth() + 1 ).toString();
            var mesF = ( mes.length == 1 ) ? '0' + mes : mes; // 02
            var ano  = objData.getFullYear().toString();
    
            var date_notification = ano+'-'+mesF+'-'+diaF; // data de expiração do banner - 7 dias

            return date_notification;
        }

        function dataExpiration2(data) {
            
            var objData = new Date(data);
        
            objData.setDate(objData.getDate() - 2); // data atual - 7 dias
    
            var dia  = objData.getDate().toString();
            var diaF = ( dia.length == 1 ) ? '0' + dia : dia; // 09
            var mes  = ( objData.getMonth() + 1 ).toString();
            var mesF = ( mes.length == 1 ) ? '0' + mes : mes; // 02
            var ano  = objData.getFullYear().toString();
    
            var date_notification = ano+'-'+mesF+'-'+diaF; // data de expiração do banner - 7 dias

            return date_notification;
        }

        function dataExpiration1(data) {
            
            var objData = new Date(data);
        
            objData.setDate(objData.getDate() - 1); // data atual - 7 dias
    
            var dia  = objData.getDate().toString();
            var diaF = ( dia.length == 1 ) ? '0' + dia : dia; // 09
            var mes  = ( objData.getMonth() + 1 ).toString();
            var mesF = ( mes.length == 1 ) ? '0' + mes : mes; // 02
            var ano  = objData.getFullYear().toString();
    
            var date_notification = ano+'-'+mesF+'-'+diaF; // data de expiração do banner - 7 dias

            return date_notification;
        }


        function getColumnExpiration() {

            var posts_expiram = [];
            var posts_validos = [];
            var posts_expirados = [];

            var trs = $('.wp-list-table tbody').find('tr');

            trs.each(function(i,tr) {

                var post_title     = $(tr).find('.row-title').text();    
                var data_expiracao = $(tr).find('.mb-admin-columns-datetime');

                data_expiracao.each(function(index,data_column) {
                    
                    var data = $(data_column).text();

                    
                    if(dataExpiration7(data) == getDataToday() || dataExpiration6(data) == getDataToday() || dataExpiration5(data) == getDataToday() || dataExpiration4(data) == getDataToday() || dataExpiration3(data) == getDataToday() || dataExpiration2(data) == getDataToday() || dataExpiration1(data) == getDataToday()) {
                        
                        var dateObj = new Date(data)
                        var dateString = dateObj.toLocaleString();                    
                        var item = post_title + ': ' + dateString;
                        
                        posts_expiram.push(item);

                        $(this).html(dateString);

                        $(this).css({
                            "background": "#fee084",
                            "color":"#a1883b",
                            "padding":"8px",
                            "border-radius":"4px"
                        });

                        return posts_expiram;

                    // BANNERS EXPIRADOS
                    } else if(dataExpiration7(data) < getDataToday()) {

                        var dateObj = new Date(data)
                        var dateString = dateObj.toLocaleString();
                        var item = post_title + ': ' + dateString;

                        posts_expirados.push(item);

                        $(this).html(dateString);

                        $(this).css({
                            "background": "#f44336",
                            "color":"#840900",
                            "padding":"8px",
                            "border-radius":"4px"
                        });

                        return posts_expirados;
                    
                    // BANNERS VÁLIDOS
                    } else {

                        var dateObj = new Date(data)
                        var dateString = dateObj.toLocaleString();                    
                        var item = post_title + ': ' + dateString;

                        posts_validos.push(item);

                        $(this).html(dateString);

                        $(this).css({
                            "background": "#4caf50",
                            "color":"#005b04",
                            "padding":"8px",
                            "border-radius":"4px"
                        });

                        return posts_validos;
                    } 
                });
            });

            createBar(posts_validos,posts_expirados,posts_expiram);
            notificaMenu(posts_validos,posts_expiram,posts_expirados);
            
        }

        
        getColumnExpiration();        

    });
});