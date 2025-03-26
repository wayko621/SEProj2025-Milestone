<!--<div class="addButton">
            <button class="btn addInputBox">+</button>
    </div>
  </div>
   
    
       
        $(".addInputBox").click(function(){
        
        var type = "input";
        
        var input = document.createElement(type);
        input.type = "text";
        input.className = "addResource newInputBox"; // set the CSS class
        input.name = "addResource";
        document.getElementById('newInput').appendChild(input); // put it into the DOM
    });
        $(".addResource").live("click",function(){ //-->
        <script>
        $("#sendrequest").click(function(){

          /*resourceList = $('.addResource').map(function() 
          {
            return $(this).val();
          }).get();

           allResource = resourceList;
           resourceArray = new Array();

         for (i in allResource)
          {
            if (allResource[i])
                resourceArray.push(allResource[i]);
          }

          var jsonData = JSON.stringify(resourceArray);
         
         if(jsonData == "[]")
         {
            alert("no json data");
         }
         else
         {*/
            $.ajax({
                type:"POST",
                    url: "addResourceItem.php", 
                    data: {resourceName: resourceName},
                     beforeSend: function(){    //show spinning gear icon 
                         $("#homecon").show();
                         
                         $("#homecon").dialog({
                                closeText: ""
                            });
                    },
                    success: function(response)
                    {
                        alert(response);
                    },
                    error: function(xhr, ajaxOptions, thrownError) 
                    { 
                        alert(xhr.responseText); 
                    }
            });
         });
</script>