<script type="text/babel">
toc['<?= $id ?>'].title = "Song: Alive";
screens['<?= $id ?>'] = function(props) {
    return (
        <Screen title={toc['<?= $id ?>'].title} id="<?= $id ?>">
            <div className="sm--section__main">

                <p>
                    Show song details and play controls...
                </p>

            </div>
        </Screen>
    )
}
</script>



