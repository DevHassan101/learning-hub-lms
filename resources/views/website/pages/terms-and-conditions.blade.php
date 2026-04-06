@extends('website.app')

@section('main')
    <section class="py-16 px-5 lg:px-20 bg-gray-100 text-[#102935]">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl lg:text-4xl font-bold text-center text-[#493BE6] uppercase mb-2">
                Terms and Conditions
            </h1>
        </div>
        <h2 class="text-md lg:text-xl font-semibold text-center uppercase mb-5">
            Welcome to ClinEd Learning Hub.
        </h2>
        <p class="text-center text-lg mb-10">
            By using this website, you agree to the our terms and conditions outlined below.
            <br>
            If you do not agree, please refrain from using our services.
        </p>

        <div class="bg-white p-6 shadow-lg rounded-lg">
            <h2 class="text-xl lg:text-2xl font-semibold mb-4">1.Introduction</h2>
            <p class="text-gray-700 mb-5">
                Welcome to Clined Learning Hub ("we," "our," or "us"). These Terms and Conditions ("Terms") govern your use
                of our website and services. By accessing or using our platform, you agree to comply with these Terms. If
                you do not agree, please do not use our services.
            </p>

            <h2 class="text-xl lg:text-2xl font-semibold mb-4">2.User Eligibility</h2>
            <p class="text-gray-700 mb-2">
                You must be at least 18 years old or have parental/guardian consent to use our platform. By using our
                services, you confirm that you meet this requirement.
            </p>

            <h2 class="text-xl lg:text-2xl font-semibold mb-4">3.Account Registration and Security</h2>
            <div class="text-gray-700 mb-5">
                <p>
                    To access certain services, you must create an account.
                    You are responsible for maintaining the confidentiality of your account credentials.
                </p>
                <p>
                    Account details should be personal and not to be shared with a third party.
                    You agree to provide accurate and up-to-date information during registration.
                    We reserve the right to suspend or terminate accounts that violate these Terms.
                </p>
            </div>

            <h2 class="text-xl lg:text-2xl font-semibold mb-4">4.Payments and Refunds</h2>
            <div class="text-gray-700 mb-5">
                <p>
                    Some services require payment, and fees are stated at the time of purchase.
                </p>
                <p>
                    All transactions are processed securely. We do not store payment information.
                </p>
                <p>
                    Refund requests are subject to our refund policy. If eligible, refunds will be processed within a
                    specified time-frame.
                </p>
            </div>

            <h2 class="text-xl lg:text-2xl font-semibold mb-4">5.User Conduct</h2>
            <div class="text-gray-700 mb-5">
                <p>
                    By using our services, you agree not to:
                </p>
                <ul class="list-disc px-10">
                    <li>
                        <p>
                            Engage in illegal or fraudulent activities.
                        </p>
                    </li>
                    <li>
                        <p>
                            Post or share offensive, harmful, or inappropriate content.
                        </p>
                    </li>
                    <li>
                        <p>
                            Attempt to interfere with our platform’s security or operations.
                        </p>
                    </li>
                </ul>
            </div>

            <h2 class="text-xl lg:text-2xl font-semibold mb-4">6.Termination of Access</h2>
            <div class="text-gray-700 mb-5">
                <p>
                    We reserve the right to suspend or terminate your account if you violate these Terms or engage in
                    activities that harm our platform or users.
                </p>
            </div>

            <h2 class="text-xl lg:text-2xl font-semibold mb-4">7.Disclaimer of Warranties</h2>
            <div class="text-gray-700 mb-5">
                <p>
                    Our services are provided "as is" without warranties of any kind.
                </p>
                <p>
                    We do not guarantee uninterrupted or error-free access to our platform.
                </p>
            </div>

            <h2 class="text-xl lg:text-2xl font-semibold mb-4">8.Limitation of Liability</h2>
            <p class="text-gray-700 mb-5">
                To the maximum extent permitted by law, Clined Learning Hub is not liable for any direct, indirect,
                incidental, or consequential damages resulting from your use of our platform.
            </p>

            <h2 class="text-xl lg:text-2xl font-semibold mb-4">9.Contact Us</h2>
            <p class="text-gray-700 mb-5">
                For any questions or concerns regarding these Terms, please contact us at:
            </p>
            <p class="text-gray-900 font-semibold">
                📧 Email: <a href="mailto:ClinEdlearninghub@gmail.com"
                    class="text-[#493BE6] hover:underline">ClinEdlearninghub@gmail.com</a>
            <p class="text-gray-900 font-semibold flex">
                <svg width="20px" class="mr-2" height="20px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"
                    stroke-width="3" stroke="#000000" fill="none">
                    <path d="M39.93,55.72A24.86,24.86,0,1,1,56.86,32.15a37.24,37.24,0,0,1-.73,6" />
                    <path d="M37.86,51.1A47,47,0,0,1,32,56.7" />
                    <path d="M32,7A34.14,34.14,0,0,1,43.57,30a34.07,34.07,0,0,1,.09,4.85" />
                    <path d="M32,7A34.09,34.09,0,0,0,20.31,32.46c0,16.2,7.28,21,11.66,24.24" />
                    <line x1="10.37" y1="19.9" x2="53.75" y2="19.9" />
                    <line x1="32" y1="6.99" x2="32" y2="56.7" />
                    <line x1="11.05" y1="45.48" x2="37.04" y2="45.48" />
                    <line x1="7.14" y1="32.46" x2="56.86" y2="31.85" />
                    <path
                        d="M53.57,57,58,52.56l-8-8,4.55-2.91a.38.38,0,0,0-.12-.7L39.14,37.37a.39.39,0,0,0-.46.46L42,53.41a.39.39,0,0,0,.71.13L45.57,49Z" />
                </svg>
                Website: <a href="{{ url('/') }}" class="ml-2">Clinedlearninghub.com</a>
            </p>
        </div>
    </section>
@endsection
