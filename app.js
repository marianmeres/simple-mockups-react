

function Screen(props) {
    const back = () => {
        return <a href="javascript:history.back()" className="sm--section__header-left" title="Go back">&larr;</a>;
    }

    const menu = () => {
        return <a href="#menu" className="sm--section__header-right">&#x2630;</a>;
    }

    const up = () => {
        if (!props.id || !toc[props.id]) return;
        let parentId = toc[props.id].parentId;
        return <a href={`#${parentId}`} className="sm--section__header-left" title="Go up in hierarchy">&uarr;</a>;
    }

    return (
        <section className="sm--section">
            <header className="sm--section__header">
                {props.hideBackNav ? '' : back()}
                {props.hideMenuNav ? '' : menu()}
                {props.hideUpNav   ? '' : up()}
                <h1>{props.title}</h1>
            </header>
            {props.children}
        </section>
    );
}


function NotFound(props) {
    return (
        <Screen title={`Screen "${props.name}" not found`} >
            <div className="sm--section__main text-center d-flex flex-row justify-content-center align-items-center">
                <a className="btn btn-secondary" href="#">
                    Back to home
                </a>
            </div>
        </Screen>
    );
}


function Breadcrumbs(props) {

    let path = []; let a = [];

    props.screen.split('_').forEach((id) => {
        path.push(id);
        id = path.join('_');
        a.push(
            <a key={id} href={`#${id}`} className="breadcrumb-item">
                {toc[id] ? toc[id].title : '?'}
            </a>
        );
    });

    return <nav className="breadcrumb sm--breadcrumb">{a}</nav>;
}


function Toc(props) {
    let _toc = [];
    Object.keys(props.screens).forEach((key) => {
        _toc.push({id: key, depth: toc[key].depth, title: toc[key].title || ''});
    });

    let i = 0;

    function _sorter(a, b) {
        if (a.id === 'index') return -1; // initial "index" special case
        if (a.id < b.id) return -1;
        if (a.id > b.id) return 1;
        return 0;
    };

    function _renderLis(parent, container) {
        container.push(
            <li key={`id_${++i}`}>
                <a href={`#${parent.id}`}>{parent.title}</a>
            </li>
        );
        let rx = new RegExp('^' + parent.id + "_");
        let children = _toc.filter(function(o) {
            return ( o.depth === parent.depth + 1 && rx.test(o.id) );
        });
        if (children.length) {
            let ul = [];
            children
                .sort(_sorter)
                .forEach(function(o) { _renderLis(o, ul); });
            container.push(<ol key={`id_${++i}`}>{ul}</ol>);
        }
    }

    let ul = [];
    _toc
        .filter(function(o){ return !o.depth; }) // top level only
        .sort(_sorter)
        .forEach(function(o){ _renderLis(o, ul) }); // recurse if needed

    return (
        <Screen title="Table of contents" >
            <div className="sm--section__main">
                <ol>{ul}</ol>
            </div>
        </Screen>
    );
}


class App extends React.Component {

    constructor(props) {
        super(props);
        this.state = {screen: props.screen}
    }

    setActiveScreen(name) {
        this.setState({screen: name});
    }

    render() {
        let id = this.state.screen;
        if (id === '') id = 'index';
        let screen;

        if (this.props.screens[id]) {
            screen = React.createElement(this.props.screens[id]);
        } else if ('toc' === id) {
            screen = <Toc screen={id} screens={this.props.screens} />
        } else {
            screen = <NotFound name={id} />
        }

        return (
            <div className="sm--app">
                <Breadcrumbs screen={id} screens={this.props.screens} />
                <div className="sm--app__main-wrap">
                    <main className="sm--main">
                        {screen}
                    </main>
                </div>
            </div>
        );
    }
}

//