function boomPerson(person_id) {
	this.id = person_id;

	boomPerson.prototype.baseUrl = '/boomcms/person';

	boomPerson.prototype.add = function() {
		var deferred = new $.Deferred(),
			person = this,
			dialog;

		dialog = new boomDialog({
			url : this.baseUrl + '/create',
			width: '600px',
			title : 'Create new person',
			closeButton: false,
			saveButton: true
		})
		.done(function() {
			var data = dialog.contents.find('form').serialize();

			person.addWithData(data)
				.done(function(response) {
					deferred.resolve();
				})
				.fail(function() {
					deferred.reject();
				});
		});

		return deferred;
	};

	boomPerson.prototype.addGroup = function(groupId) {
		return this.addRelationship('group', groupId);
	};

	boomPerson.prototype.addRelationship = function(type, id) {
		return $.ajax({
			url: this.baseUrl + '/' + this.id + '/' + type + '/' + id,
			type: 'put'
		});
	};

	boomPerson.prototype.addSite = function(siteId) {
		return this.addRelationship('site', siteId);
	};

	boomPerson.prototype.addWithData = function(data) {
		return $.post(this.baseUrl, data);
	};

	boomPerson.prototype.delete = function() {
		var deferred = new $.Deferred(),
			person = this,
			confirmation = new boomConfirmation('Please confirm', 'Are you sure you want to delete this person?');

			confirmation
				.done(function() {
					person.deleteMultiple([person.id])
					.done(function() {
						deferred.resolve();
					});
				});

		return deferred;
	};

	boomPerson.prototype.deleteMultiple = function(peopleIds) {
		return 	$.ajax({
			type: 'delete',
			url: this.baseUrl,
			data: {
				'people[]': peopleIds
			}
		});
	};

	boomPerson.prototype.removeGroup = function(groupId) {
		return this.removeRelationship('group', groupId);
	};

	boomPerson.prototype.removeRelationship = function(type, id) {
		return $.ajax({
			type: 'delete',
			url: this.baseUrl + '/' + this.id + '/' + type + '/' + id
		});
	};

	boomPerson.prototype.removeSite = function(siteId) {
		return this.removeRelationship('site', siteId);
	};

	boomPerson.prototype.save = function(data) {
		return $.ajax({
			type: 'put',
			url: this.baseUrl + '/' + this.id,
			data: data
		});
	};
}
