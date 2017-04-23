<script type="text/babel">
toc['<?= $id ?>'].title = "Artists";
screens['<?= $id ?>'] = function(props) {
    return (
        <Screen title={toc['<?= $id ?>'].title} id="<?= $id ?>">
            <div className="sm--section__main">

                <b>P</b>
                <ul>
                    <li><a href="#<?= $id ?>_artist">Pearl Jam</a></li>
                </ul>

            </div>
        </Screen>
    )
}
</script>






