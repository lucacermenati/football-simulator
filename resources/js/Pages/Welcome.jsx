import GuestLayout from "@/Layouts/GuestLayout";
import { Head } from "@inertiajs/react";

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    return (
        <GuestLayout>
            <Head title="Welcome" />
            <img src="/logo.svg" alt="Logo" className="mx-auto w-64 h-64" />
            <div className="flex flex-col items-center space-y-4 w-1/2">
                <h1 className="text-2xl font-bold text-center">
                    Welcome to Football World Builder & Simulator
                </h1>
                <p className="mx-24 text-lg text-gray-700">
                    Create, shape, and manage your own football universe. Build
                    leagues, clubs, and histories, simulate seasons, and watch
                    your world evolve over time.{" "}
                    <a className="hover:text-red-900" href={route("register")}>
                        Sign up
                    </a>{" "}
                    or{" "}
                    <a className="hover:text-red-900" href={route("login")}>
                        log in
                    </a>{" "}
                    with your username and password to get started.
                </p>
            </div>
        </GuestLayout>
    );
}
