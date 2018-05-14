
        // Onclick function for button to update the map

        function inputData() {
            // Getting the new type
            var newTypeList = document.getElementById("myListType");
            var selectedType = newTypeList.options[newTypeList.selectedIndex].value;
            // Getting the new year
            var newYearList = document.getElementById("myListYear");
            var selectedYear = newYearList.options[newYearList.selectedIndex].value;
            // Getting the new group
            var newGroupList = document.getElementById("myListGroup");
            var selectedGroup = newGroupList.options[newGroupList.selectedIndex].value;
            // Append the text
            var selected = "./projvisuals/childdata52015LDC.csv";
            // Remove to draw new map            
            //d3.select("svg").remove();            
            // Call the real update function
            updateData(selected);
        }



        // Naive Attempt to update Data
        function updateData(FileName) {
            // Set the scale of the Map
            var width = 800,
                height = 500;
            var center = [144.96, -37.81] //d3.geo.centroid(it)
            var scale = 50000;
            var offset = [(width / 2) - 50, height / 2];
            var slice = FileName.substring(28,31);
            var cscale;
            if (slice === "ASC"){
                cscale = colorbrewer.YlGn[9];
            } else if (slice === "BSC"){
                cscale = colorbrewer.Oranges[9];
            } else {
                cscale = colorbrewer.Reds[9];
            }

            // Set the projection based on the scale
            var projection = d3.geo.mercator().scale(scale).center(center).translate(offset);

            // Create the svg element
            var svg = d3.select("center.map").append("svg")
                .attr("class", "map")
                .attr("width", width)
                .attr("height", height)
                .attr("viewBox", "0 0 660 500") // make it // responsive
                .attr("preserveAspectRatio", "xMidYMid");

            // TBD: Adding border for the map

            // Draw the path using the projection
            var path = d3.geo.path()
                .projection(projection);

            // Append the group unit
            var g = svg.append("g");
            var div = d3.select("center.map").append("div")
                .attr("class", "tooltip")
                .style("opacity", 0);
            // Load the Data file to display the Child cost
            var child;
            var childArray = [];
            d3.csv(FileName, function(data) {
                child = {};
                childcount = {};
                servicecount = {};
                hrstd = {};
                for (var i = 0; i < data.length; i += 1) {
                    // Have to replace the $ in the file
                    child[data[i].code] = parseFloat(data[i].hrfee.replace("$", ""));
                    childcount[data[i].code] = parseFloat(data[i].childcount.replace("$", ""));
                    servicecount[data[i].code] = parseFloat(data[i].servicecount.replace("$", ""));
                    hrstd[data[i].code] = parseFloat(data[i].hrstd.replace("$", ""));
                    childArray.push(parseFloat(data[i].hrfee.replace("$", "")));
                }
            });

            // Pattern Definition
            var getPattern;
            // Get Pattern Function
            getPattern = function(pattern) {
                // Calculate the percentile 25, 50, 75
                var per10 = d3.quantile(childArray, 0.10);
                var per20 = d3.quantile(childArray, 0.20);
                var per30 = d3.quantile(childArray, 0.30);
                var per40 = d3.quantile(childArray, 0.40);
                var per50 = d3.quantile(childArray, 0.50);
                var per60 = d3.quantile(childArray, 0.60);
                var per70 = d3.quantile(childArray, 0.70);
                var per80 = d3.quantile(childArray, 0.80);
                var per90 = d3.quantile(childArray, 0.90);
                // Get the current number
                var m = child[pattern.properties.SA3_CODE11];

                if (m > per90) {
                    return cscale[8];
                }
                if (m > per80) {
                    return cscale[7];
                }
                if (m > per70) {
                    return cscale[6];
                }
                if (m > per60) {
                    return cscale[5];
                }
                if (m > per50) {
                    return cscale[4];
                }
                if (m > per40) {
                    return cscale[3];
                }
                if (m > per30) {
                    return cscale[2];
                }
                if (m > per20) {
                    return cscale[1];
                }
                else {
                    return cscale[0];
                }
                return cscale[0];
            };

            // Load the statistical region to draw the Map
            d3.json("./sa3.json", function(error, it) {

                childArray.sort();
                // Draw the path
                svg.selectAll("path")
                    .data(it.features)
                    .enter().append("path")
                    .attr("class", function(d) {
                        return "prov2 " + d.id;
                    })
                    .style("fill", function(d) {
                        return getPattern(d);
                    })
                    // draw the path
                    .attr("d", path)
                    .on('mouseover', function(d) {


                        var nodeSelection = d3.select(this).style("fill", function(de) {
                            // Adding Div
                            div.transition()
                                .duration(200)
                                .style("opacity", .9);
                            div.html("Area Name: " + 
                                    de.properties.SA3_NAME11 + "</br>" +
                                    "Area Code: " +
                                    "(" + de.properties.SA3_CODE11 + ")" + "</br>" +  
                                    "Mean Fee Per Hour: " + 
                                    " $" + child[de.properties.SA3_CODE11] + "</br>" + 
                                    "Fee Range: $" + Math.round(child[de.properties.SA3_CODE11] - 1.65*hrstd[de.properties.SA3_CODE11]) +  " to $" + Math.round(child[de.properties.SA3_CODE11] + 1.65*hrstd[de.properties.SA3_CODE11]) +"</br>" + 
                                    "Number of Facilities in Area: " + servicecount[de.properties.SA3_CODE11]
                                    ) 
                                .style("left", (d3.event.pageX) + "px")
                                .style("top", (d3.event.pageY - 28) + "px");
                            return 'orange';
                        })
                    })
                    .on('mouseout', function(d) {
                        var nodeSelection = d3.select(this).style("fill", function(de) {
                            div.transition()
                                .duration(500)
                                .style("opacity", 0);
                            return getPattern(de);
                        })
                    })
                    .attr("d", path);
                // draw all the features together (no different styles)
                svg.append("path")
                    .datum(it.features)
                    .attr("class", "map")
                    .attr("d", path);
            })

        }
        // Default
        inputData();
        // Mapping Update Button and real update
        d3.selectAll(".m")
            .on("click", function() {
                var FileNameNew = this.getAttribute("value");
                updateData(FileNameNew);
                //d3.event.stopPropagation();
            });