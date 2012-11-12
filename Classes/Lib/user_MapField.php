<?php
class user_MapField {

    /**
     *
     * @var t3lib_DB
     */
    protected $db;
    
    function __construct() {
        $this->db = $GLOBALS['TYPO3_DB'];
    }
    function render(array &$PA, t3lib_TCEforms $pObj)    {
            //debug($PA);
        $pinData = $PA['row'];
        $mapId = $pinData['pid'];
        if($mapId){
            $rows = $this->db->exec_SELECTgetRows('*', 'tx_ajadomaps_domain_model_map', 'deleted=0 AND hidden=0 AND pid='.$mapId);
            $mapData = $rows[0];
            $mapSrc = '../uploads/tx_ajadomaps/'. $mapData['image'];
            $pinSrc = '../uploads/tx_ajadomaps/'. $mapData['pin_image'];
            //debug($pinData);
            if($pinData['pin_image']){
                $fieldData = $pinData['pin_image'];
                $pinSrc = array_pop(explode("|", $fieldData));
                $pinSrc = '../uploads/tx_ajadomaps/'. $pinSrc;
            }
            //debug($imageUrl);
            
        }
        
        $baseElementId = isset($PA['itemFormElID']) ? $PA['itemFormElID'] : $PA['table'] . '_map';
        //debug($baseElementId);
        $pinId = "pin-".$pinData['uid'];
        $x = $PA['row']['x'] ? $PA['row']['x'] : 0;
        $y = $PA['row']['y'] ? $PA['row']['y'] : 0;
        
        $html = '<div style="position: relative; ">
                    <img src="'.$mapSrc.'" />
                    <div class="pin" id="'.$pinId.'" style="position: absolute; left: '.$x.'px; top: '.$y.'px; color: #F0F; cursor: move;"><img src="'.$pinSrc.'" /></div>
                    <div style="clear: both;"></div>
                 </div>';
        $html .= '<script>
                    new Draggable($("'.$pinId.'"), {
                        onDrag: function(obj,event){
                            var offset = $("'.$pinId.'").positionedOffset();
                            $$(\'input[name="data[tx_ajadomaps_domain_model_pin]['.$pinData['uid'].'][x]_hr"]\')[0].value = offset.left;
                            $$(\'input[name="data[tx_ajadomaps_domain_model_pin]['.$pinData['uid'].'][x]"]\')[0].value = offset.left;
                            $$(\'input[name="data[tx_ajadomaps_domain_model_pin]['.$pinData['uid'].'][y]_hr"]\')[0].value = offset.top;
                            $$(\'input[name="data[tx_ajadomaps_domain_model_pin]['.$pinData['uid'].'][y]"]\')[0].value = offset.top;
                        }
                     });
                  </script>';
        return $html;
    }

}

?>
