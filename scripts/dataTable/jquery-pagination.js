/**
 * This jQuery plugin displays pagination links inside the selected elements.
 *
 * @author Gabriel Birke (birke *at* d-scribe *dot* de)
 * @version 1.2
 * @param {int} maxentries Number of entries to paginate
 * @param {Object} opts Several options (see README for documentation)
 * @return {Object} jQuery Object
 */

jQuery.fn.pagination = function(maxentries, opts){
	opts = jQuery.extend({
		items_per_page:10,
		num_display_entries:10,
		current_page:0,
		num_edge_entries:0,
		link_to:"#",
		prev_text:"Prev",
		next_text:"Next",
		ellipse_text:"...",
		prev_show_always:true,
		next_show_always:true,
		callback:function(){return false;}
	},opts||{});
	
	return this.each(function() {
		/**
		 * Calculate the maximum number of pages
		 */
		function numPages() {
			return Math.ceil(maxentries/opts.items_per_page);
		}
		
		/**
		 * Calculate start and end point of pagination links depending on 
		 * current_page and num_display_entries.
		 * @return {Array}
		 */
		function getInterval()  {
			var ne_half = Math.ceil(opts.num_display_entries/2);
			var np = numPages();
			var upper_limit = np-opts.num_display_entries;
			var start = current_page>ne_half?Math.max(Math.min(current_page-ne_half, upper_limit), 0):0;
			var end = current_page>ne_half?Math.min(current_page+ne_half, np):Math.min(opts.num_display_entries, np);
			return [start,end];
		}
		
		/**
		 * This is the event handling function for the pagination links. 
		 * @param {int} page_id The new page number
		 */
		function pageSelected(page_id, evt){
			current_page = page_id;
			drawLinks();
			var continuePropagation = opts.callback(page_id, panel);
			if (!continuePropagation) {
				if (evt.stopPropagation) {
					evt.stopPropagation();
				}
				else {
					evt.cancelBubble = true;
				}
			}
			return continuePropagation;
		}
		
		/**
		 * This function inserts the pagination links into the container element
		 */
		function drawLinks() {
			panel.empty();
			var interval = getInterval();
			var np = numPages();
			// This helper function returns a handler function that calls pageSelected with the right page_id
			var getClickHandler = function(page_id) {
				return function(evt){ return pageSelected(page_id,evt); }
			}
			// Helper function for generating a single link (or a span tag if it's the current page)
			var appendItem = function(page_id, appendopts){
				page_id = page_id<0?0:(page_id<np?page_id:np-1); // Normalize page id to sane value
				appendopts = jQuery.extend({text:page_id+1, classes:""}, appendopts||{});
				if(page_id == current_page){
					var lnk = jQuery("<span class='current'>"+(appendopts.text)+"</span>");
				}
				else
				{
					var lnk = jQuery("<a>"+(appendopts.text)+"</a>")
						.bind("click", getClickHandler(page_id))
						.attr('href', opts.link_to.replace(/__id__/,page_id));
						
						
				}
				if(appendopts.classes){lnk.addClass(appendopts.classes);}
				panel.append(lnk);
			}
			// Generate "Previous"-Link
			if(opts.prev_text && (current_page > 0 || opts.prev_show_always)){
				appendItem(current_page-1,{text:opts.prev_text, classes:"prev"});
			}
			// Generate starting points
			if (interval[0] > 0 && opts.num_edge_entries > 0)
			{
				var end = Math.min(opts.num_edge_entries, interval[0]);
				for(var i=0; i<end; i++) {
					appendItem(i);
				}
				if(opts.num_edge_entries < interval[0] && opts.ellipse_text)
				{
					jQuery("<span>"+opts.ellipse_text+"</span>").appendTo(panel);
				}
			}
			// Generate interval links
			for(var i=interval[0]; i<interval[1]; i++) {
				appendItem(i);
			}
			// Generate ending points
			if (interval[1] < np && opts.num_edge_entries > 0)
			{
				if(np-opts.num_edge_entries > interval[1]&& opts.ellipse_text)
				{
					jQuery("<span>"+opts.ellipse_text+"</span>").appendTo(panel);
				}
				var begin = Math.max(np-opts.num_edge_entries, interval[1]);
				for(var i=begin; i<np; i++) {
					appendItem(i);
				}
				
			}
			// Generate "Next"-Link
			if(opts.next_text && (current_page < np-1 || opts.next_show_always)){
				appendItem(current_page+1,{text:opts.next_text, classes:"next"});
			}
		}
		
		// Extract current_page from options
		var current_page = opts.current_page;
		// Create a sane value for maxentries and items_per_page
		maxentries = (!maxentries || maxentries < 0)?1:maxentries;
		opts.items_per_page = (!opts.items_per_page || opts.items_per_page < 0)?1:opts.items_per_page;
		// Store DOM element for easy access from all inner functions
		var panel = jQuery(this);
		// Attach control functions to the DOM element 
		this.selectPage = function(page_id){ pageSelected(page_id);}
		this.prevPage = function(){ 
			if (current_page > 0) {
				pageSelected(current_page - 1);
				return true;
			}
			else {
				return false;
			}
		}
		this.nextPage = function(){ 
			if(current_page < numPages()-1) {
				pageSelected(current_page+1);
				return true;
			}
			else {
				return false;
			}
		}
		// When all initialisation is done, draw the links
		drawLinks();
        // call callback function
        opts.callback(current_page, this);
	});
	
}


function pageselectCallback(page_index, jq){
	
                var items_per_page = 10;
                var rowCount = $('#tblList tr').length;
                var rows = document.getElementById("tblList").rows;
                //var sTerm = $.trim(searchTerm);
                //alert("sTerm="+sTerm);
                if (searchTerm!=''){                	
                	var max_elem = Math.min((page_index+1) * items_per_page, totalResult);
                	var from = page_index*items_per_page;
                	var to = max_elem;
                	
                	//var terms = searchTerm.toLowerCase().split(" ");
                	             
                	var counter = 0;
                	var display = '';
                	
                	for (var r = 1; r < rowCount; r++) {
                		display = '';
                		
                		//for (var i = 0; i < terms.length; i++) {
                			//if (table.rows[r].innerHTML.replace(/<[^>]+>/g, "").toLowerCase().indexOf(terms[i]) < 0) {
            				//	display = 'none';
            				//}          				
            			//}
                		
                		if (table.rows[r].innerHTML.replace(/<[^>]+>/g, " ").toLowerCase().indexOf(searchTerm) < 0) {
                			display = 'none';
            			}
                		
                		if (display==''){
                			
                			if (from <= counter && counter <= to){
                    			display='';
                    		}else{
                    			display='none';
                    		}
                			
                			counter++;
                		}
                		
                		table.rows[r].style.display = display;                		
            		}
                	
                }else{
                	var max_elem = Math.min((page_index+1) * items_per_page, (rowCount-1));

                	var from = page_index*items_per_page;
                	var to = max_elem;
				
                	//alert("max_elem="+max_elem+"  from="+from+"  To="+to+"  rowCount="+(rowCount-1) );
                	
                	for (var i = 1; i < rowCount; i++) {
                		if (from < i && i <= to)
                		{
                			rows[i].style.display = '';
                		}
                		else{
                			rows[i].style.display = 'none';
                		}
                	}
                	
                	//alert("rowCount="+rowCount);
                	if (rowCount<12){
                		document.getElementById("Pagination").style.display="none";
                	}else{
                		document.getElementById("Pagination").style.display="";
                	}
                }        		

                return false;
            }

            // The form contains fields for many pagiantion optiosn so you can
            // quickly see the resuluts of the different options.
            // This function creates an option object for the pagination function.
            // This will be be unnecessary in your application where you just set
            // the options once.
            function getOptionsFromForm(){
                var opt = {callback: pageselectCallback};
                // Collect options from the text fields - the fields are named like their option counterparts
                $("input:hidden").each(function(){
                    opt[this.name] = this.className.match(/numeric/) ? parseInt(this.value) : this.value;
                });
                // Avoid html injections in this demo
                var htmlspecialchars ={ "&":"&amp;", "<":"&lt;", ">":"&gt;", '"':"&quot;"}
                $.each(htmlspecialchars, function(k,v){
                    opt.prev_text = opt.prev_text.replace(k,v);
                    opt.next_text = opt.next_text.replace(k,v);
                })
                return opt;
            }

            // When document has loaded, initialize pagination and form
            $(document).ready(function(){
            	hasSearch = false;
				// Create pagination element with options from form
            	if(document.getElementById("tblList")!=null){
            		var optInit = getOptionsFromForm();

            		var rowCount = $('#tblList tr').length;      
            		//alert("rowCount="+rowCount);
            		$("#Pagination").pagination((rowCount-1), optInit);
            	}

            });


