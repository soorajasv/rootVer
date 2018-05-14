console.log("start");
        var width = 800,
            height = 500;
        var center = [144.96, -37.81]; //d3.geo.centroid(it)
        var scale = 100000;
        var offset = [(width / 2) - 50, height / 2];
console.log("1");
        // Set the projection based on the scale
        var projection = d3.geo.mercator().scale(scale).center(center).translate(offset);
console.log("2");
        // Create the svg element
        var svg = d3.select("div.sub").append("svg")
            .attr("class", "map")
            .attr("width", width)
            .attr("height", height)
            .attr("viewBox", "0 0 660 500") // make it // responsive
            .attr("preserveAspectRatio", "xMidYMid");
console.log("3");
        // TBD: Adding border  for the map

        // Draw the path using the projection
        var path = d3.geo.path()
            .projection(projection);

        // Append the group unit
        var g = svg.append("g");
        var div = d3.select("div.sub").append("div")
            .attr("class", "tooltip")
            .style("opacity", 0);
console.log("4");       

        d3.csv("d3map/melbourneEducation.csv", function(data) {
            postcode = {};
            edu = {};
            for (var i = 0; i < data.length; i += 1) {
                // Have to replace the $ in the file
                postcode[data[i].suburb] = data[i].postcode
                edu[data[i].suburb] = parseFloat(data[i].freq.replace("$", ""));
            }
        });
        d3.csv("d3map/melbourneProvider.csv", function(data) {
            postcodePro = {};
            pro = {};
            for (var i = 0; i < data.length; i += 1) {
                // Have to replace the $ in the file
                postcodePro[data[i].suburb] = data[i].postcode
                pro[data[i].suburb] = parseFloat(data[i].freq.replace("$", ""));
            }
        });
console.log("5");
        d3.csv("d3map/hrfees.csv", function(data) {
            qtile = {};
            postcodeHr = {};
            fee = {};
            for (var i = 0; i < data.length; i += 1) {
                // Have to replace the $ in the file
                postcodeHr[data[i].suburb] = data[i].postcode;
                fee[data[i].suburb] = parseFloat(data[i].fees.replace("$", ""));
                qtile[data[i].suburb] = parseInt(data[i].qtile);
            }
        });
console.log("6");
        // CS scale definition:
        var cscale = colorbrewer.Oranges[9];
        // Get Pattern Function
        var getPattern = function(pattern) {
            // Get the current number
            var m = qtile[pattern.properties.vic_loca_2];

            if (m == 4) {
                return cscale[8];
            }
            if (m == 3) {
                return cscale[6];
            }
            if (m == 2) {
                return cscale[4];
            }
            if (m == 1) {
                return cscale[2];
            } else {
                return cscale[0];
            }
            return cscale[0];
        };
console.log("7");
        // Load the statistical region to draw the Map
        d3.json("d3map/MelSub.json", function(error, it) {

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
                        var NoChildCare =unDef(edu[de.properties.vic_loca_2], pro[de.properties.vic_loca_2]);
                        var RateFees =reText(fee[de.properties.vic_loca_2]);
                        div.transition()
                            .duration(200)
                            .style("opacity", .9);
                        div.html("Suburb: " + 
                                de.properties.vic_loca_2 + "</br>" +
                                "Child Care Services: " + NoChildCare + "</br>" +
                                "Average Fees Per Day: " + RateFees
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
console.log("8");
        var unDef = function(a,b){
            if (a == null && b == null){
                return "No Data Available";

            } else {
                if (a == null && b!= null){
                    return a;
                } else if (b == null && a!= null) {
                    return b;
                } else {
                    return a + b;
                }
            }
        }
console.log("9");
        var reText = function(value){
            if (value == null){
                return "No Data Available";
            } else {
                return "$" + value;
            }
        }  
console.log("end"); 