<script type="text/babel">
toc['<?= $id ?>'].title = "Intro";
screens['<?= $id ?>'] = function(props) {
    return (
        <Screen title={toc['<?= $id ?>'].title} id="<?= $id ?>">
            <div className="sm--section__main">
                <p>
                    This is my firts React excercise...

                    Read about <a
                        href="https://github.com/marianmeres/simple-mockups">Simple Mockups here</a>.
                </p>

                <hr/>

                <ul>
                    <li><a href="#<?= $id ?>_10-artists">Artists</a></li>
                    <li><a href="#<?= $id ?>_20-albums">Albums</a></li>
                    <li><a href="#<?= $id ?>_30-songs">Songs</a></li>
                </ul>
            </div>
        </Screen>
    )
}
</script>


