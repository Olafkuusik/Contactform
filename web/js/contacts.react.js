var ContactSection = React.createClass({
    getInitialState: function() {
        return {
            contacts: []
        }
    },

    componentDidMount: function() {
        this.loadContactsFromServer();
        setInterval(this.loadContactsFromServer, 2000);
    },

    loadContactsFromServer: function() {
        $.ajax({
            url: this.props.url,
            success: function (data) {
                if (!data.contacts) {
                    throw 'AJAX call for contacts appears to be corrupted! The response does not have a "contacts" key. Check the AJAX call!';
                }
                this.setState({contacts: data.contacts});
            }.bind(this)
        });
    },

    render: function() {
        return (
            <div>
                <div className="contacts-container">
                    <h2 className="contacts-header">Contact</h2>
                    <div><i className="fa fa-plus plus-btn"></i></div>
                </div>
                <ContactList contact={this.state.contacts} />
            </div>
        );
    }
});

var ContactList = React.createClass({
    render: function() {
        var contactNodes = this.props.contact.map(function(contact) {
            return (
                <ContactBox firstname={contact.firstname} lastname={contact.lastname} bday={contact.bday} phonenumber={contact.phonenumber} address={contact.address} key={contact.id}>{contact.contact}</ContactBox>
            );
        });

        return (
            <section id="cd-timeline">
                {contactNodes}
            </section>
        );
    }
});

var ContactBox = React.createClass({
    render: function() {
        return (
            <div className="cd-timeline-block">
                <div className="cd-timeline-content">
                    <h2><a href="#">{this.props.firstname}</a></h2>
                    <p>{this.props.children}</p>
                    <span className="cd-date">{this.props.bday}</span>
                </div>
            </div>
        );
    }
});

window.ContactSection = ContactSection;
