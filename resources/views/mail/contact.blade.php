<h2>{{ $contactForm->firstName }} {{ $contactForm->lastName }} has said the following:</h2>

<p>From room number: {{ $contactForm->roomNumber }}</p>

<p>Category: {{ $contactForm->category }}</p>
<p>Created at: {{ $contactForm->created_at }}</p>
<h3>Message</h3>
<p>{{ $contactForm->message }}</p>
