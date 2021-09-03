<br>
{if !$RECORDS}
        <center><h1>Welcome to Slideshow<h1>
        <h4>The support is enabled through Javascript for Leads & Contacts!</h4></center>
{else}
<script type="text/javascript" src="modules/Slideshow/js/remark.min.js"></script>
<style type="text/css">
.remark-slide h1 { font-size: 30px; }
.remark-slide em { font-size: 18px; }
#page { display: none; }
</style>

<!-- Prepare remarkjs friendly source -->
<textarea id="source">
class: center, middle
# {$SRCMODULE} ( {$COUNT} )
---
{foreach item=RECORD from=$RECORDS}
Field | Value
---- | ---
{foreach key=FIELDNAME item=FIELDVALUE from=$RECORD}
{if $FIELDVALUE}
{$FIELDNAME} | {$FIELDVALUE}
{/if}
{/foreach}
---
{/foreach}

class: center, middle
# Thank you
</textarea>

<!-- Trigger rendering on the client-side -->
<script type="text/javascript">
        var slideshow = remark.create();
        jQuery(function(){
                jQuery('table').addClass('table table-bordered');
        });
</script>
{/if}
