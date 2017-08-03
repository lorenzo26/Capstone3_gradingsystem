
                        function compute(){
                            var finalScore = 0;
                            $('.grades').each(function(){
                            var totalScore = 0;
                            var maxScore = 0;
                            var weight = 100;

                            if(!isNaN($(this).children('select').first().val()))
                                weight = $(this).children('select').first().val()

                                $(this).find('input').each(function(){
                                
                                if($(this).hasClass('score')){
                                    totalScore += parseInt($(this).val())
                                }
                                else{
                                    maxScore += parseInt($(this).val())
                                }

                            })
                            
                            finalScore += (totalScore/maxScore)*(weight);

                            })
                            $('#second').val(finalScore)
                        }

                        $('#percent').change(function(){
                   
                            var content = '';
                        
                        for(var x=0; x<$(this).val();x++){
                             content += "<div> <div id='grades"+x+"' class='col-md-3 grades'><h3>PERECENT: "+(x+1)+"</h3><select onchange='verifyWeight();' class='percentage form-control' id='percetage"+x+"'><option value='10'>10%</option><option value='15'>15%</option><option value='20'>20%</option><option value='25'>25%</option><option value='30'>30%</option><option value='35'>35%</option><option value='40'>40%</option><option value='45'>45%</option><option value='50'>50%</option><option value='55'>55%</option><option value='60'>60%</option><option value='65'>65%</option><option value='70'>70%</option><option value='75'>75%</option><option value='80'>80%</option><option value='85'>85%</option><option value='90'>90%</option><option value='95'>95%</option><option value='100'>100%</option></select><button onclick='createForm("+x+")' id='addBtn"+x+"' class='btn btn-primary'>ADD</button><br><li  class='list-group-item'><input type='number' class='score' name='score1'  min='1' max='999'   class='form-control'>/<input type='number' class='total'"+x+" name='total1' min='1' max='999'></div><input type='hidden' id='cnt"+x+"' value='1'></li></div>";
                        }
                        $('#grades_container').html(content);
                    })

                    function verifyWeight(){
                        var weight = 0;
                        $('.percentage').each(function(){
                    
                         weight += parseInt($(this).val())
                        console.log(weight);
                    })

                        if(parseInt(weight) != 100){
                            $('#compute').attr('disabled',true);
                        } else {
                            $('#compute').attr('disabled',false);
                            }
                        }

                        function createForm(x){
                         var cnt = $('#cnt'+x).val();
                            cnt++;
                            
                            $('#grades'+x).append('<li  class="list-group-item"><input type="number" class="score" name="score'+cnt+'"  min="1" max="999" >/<input type="number" name="total'+cnt+'"  min="1" max="999" ></li>');
                            $('#cnt'+x).val(cnt);
                        }