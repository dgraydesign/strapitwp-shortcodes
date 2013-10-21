(function() {	
	tinymce.create('tinymce.plugins.strapitShortcodeMce', {
		init : function(ed, url){
			tinymce.plugins.strapitShortcodeMce.theurl = url;
		},
		createControl : function(btn, e) {
			if ( btn == "strapit_shortcodes_button" ) {
				var a = this;	
				var btn = e.createSplitButton('strapit_button', {
	                title: "Insert Shortcode",
					image: tinymce.plugins.strapitShortcodeMce.theurl +"/images/shortcodes.png",
					icons: false,
	            });
	            btn.onRenderMenu.add(function (c, b) {

	            	b.add({title : 'Strapit Shortcodes', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

					// Buttons
					c = b.addMenu({title:"Buttons"});
						a.render( c, "Button", "button" );											

					// Toggles
					c = b.addMenu({title:"Accordion"});
						//a.render( c, "jQuery Accordion", "accordion" );
						a.render( c, "Accordion", "accordionbootstrap" );

					// More Components
					c = b.addMenu({title:"More Strapit Components"});
						a.render( c, "Jumbotron", "jumbotron" );
						a.render( c, "Modal", "modal" );
						a.render( c, "Well", "well" );
					
				});
	            
	          return btn;
			}
			return null;               
		},
		render : function(ed, title, id) {
			ed.add({
				title: title,
				onclick: function () {

					// Selected content
					var mceSelected = tinyMCE.activeEditor.selection.getContent();
					
					// Add highlighted content inside the shortcode when possible - yay!
					if ( mceSelected ) {
						var strapitDummyContent = mceSelected;
					} else {
						var strapitDummyContent = 'Sample Content';
					}
					
					// Accordion
					if(id == "accordion") {
						tinyMCE.activeEditor.selection.setContent('[strapit_accordion]<br />[strapit_accordion_section title="Section 1"]<br />Accordion Content<br />[/strapit_accordion_section]<br />[strapit_accordion_section title="Section 2"]<br />Accordion Content<br />[/strapit_accordion_section]<br />[/strapit_accordion]');
					}

					// Accordion Bootstrap
					if(id == "accordionbootstrap") {
						tinyMCE.activeEditor.selection.setContent('[strapit_accordion_bootstrap name="UniqueName"]<br />[strapit_accordion_bootstrap_section color="primary" name="UniqueName" heading="Container One Title" number="1" open="yes"]<br />Accordion Bootstrap Content<br />[/strapit_accordion_bootstrap_section]<br />[strapit_accordion_bootstrap_section color="primary" name="UniqueName" heading="Container Two Title" number="2"]<br />Accordion Bootstrap Content<br />[/strapit_accordion_bootstrap_section]<br />[/strapit_accordion_bootstrap]');
					}
					
					// Button
					if(id == "button") {
						tinyMCE.activeEditor.selection.setContent('[strapit_button color="primary" size="lg" url="#" title="Visit Site" target="blank"]Button Text[/strapit_button]');
					}

					// Jumbotron
					if(id == "jumbotron") {
						tinyMCE.activeEditor.selection.setContent('[strapit_jumbotron]Content of the Jumbotron <br />[strapit_button color="primary" size="lg" url="http://digitalfirstmedia.com/" title="Visit Site" target="blank"]Button Text[/strapit_button][/strapit_jumbotron]');
					}

					//Modal
					if(id == "modal") {
						tinyMCE.activeEditor.selection.setContent('[strapit_modal id="1" header="Title of Modal" color="danger" size="lg" text="Click Here"]Here is he content[/strapit_modal]');
					}	

					//Tooltip
					if(id == "tooltip") {
						tinyMCE.activeEditor.selection.setContent('[strapit_tooltip text="Text in tooltip" placement="top"]Link for tooltip[/strapit_tooltip]');
					}

					//Tooltip
					if(id == "tooltipbtn") {
						tinyMCE.activeEditor.selection.setContent('[strapit_tooltip text="Text in tooltip" placement="top" color="primary" size="lg"]Link for tooltip[/strapit_tooltip]');
					}

					// Well
					if(id == "well") {
						tinyMCE.activeEditor.selection.setContent('[strapit_well width="50%"]Your Well Content[/strapit_well]');
					}
					
					
					return false;
				}
			})
		}
	
	});
	tinymce.PluginManager.add("strapit_shortcodes", tinymce.plugins.strapitShortcodeMce);
})();  