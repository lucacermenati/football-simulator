export default function GuestLayout({ children }) {
    return (
        <div className="min-h-screen bg-[url('/background.svg')] bg-no-repeat bg-cover bg-center sm:pt-0">
            <div className="flex justify-end pt-6 pr-12 space-x-4">
                <a className="hover:text-red-900" href={route("register")}>
                    Register
                </a>
                <a className="hover:text-red-900" href={route("login")}>
                    Login
                </a>
            </div>
            <div className="flex flex-col items-center">{children}</div>
        </div>
    );
}
