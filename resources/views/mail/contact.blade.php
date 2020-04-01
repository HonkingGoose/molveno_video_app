<h2>{{ $contactForm->firstName }} {{ $contactForm->lastName }} has said the following:</h2>

<p>From room number: {{ $contactForm->roomNumber }}</p>

<p>category: {{ $contactForm->category }}</p>
<p>created at: {{ $contactForm->created_at }}</p>
<h3>message</h3>
<p>{{ $contactForm->message }}</p>
