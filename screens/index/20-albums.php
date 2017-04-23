<script type="text/babel">
toc['<?= $id ?>'].title = "Albums";
screens['<?= $id ?>'] = function(props) {
    return (
        <Screen title={toc['<?= $id ?>'].title} id="<?= $id ?>">
            <div className="sm--section__main">

                <b>T</b>
                <ul>
                    <li><a href="#index_10-artists_artist_album">Ten</a></li>
                </ul>

            </div>
        </Screen>
    )
}
</script>





