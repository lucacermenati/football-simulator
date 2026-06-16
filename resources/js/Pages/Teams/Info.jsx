import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import TeamLayout from "./Components/TeamLayout";

export default function TeamInfo({ team }) {
    return (
        <AuthenticatedLayout>
            <Head title={`${team.name} - Info`} />
            <TeamLayout team={team}>
                <div className="p-6">
                    <div className="grid grid-cols-2 gap-2">
                        <div className="font-semibold text-primaryRed-600">
                            Official colors
                        </div>
                        <div className="flex gap-2">
                            <span
                                className="w-4 h-4 rounded-full border border-lightGrey-600"
                                style={{ backgroundColor: team.first_color }}
                            ></span>
                            <span
                                className="w-4 h-4 rounded-full border border-lightGrey-600"
                                style={{ backgroundColor: team.second_color }}
                            ></span>
                        </div>
                        <div className="font-semibold text-primaryRed-600">
                            Year of foundation
                        </div>
                        <div className="text-darkGrey-600">
                            {team.year_of_foundation}
                        </div>
                        <div className="font-semibold text-primaryRed-600">
                            Stadium
                        </div>
                        <div className="text-darkGrey-600">{team.stadium}</div>
                        <div className="font-semibold text-primaryRed-600">
                            Rating
                        </div>
                        <div className="text-darkGrey-600">{team.rating}</div>
                    </div>
                </div>
            </TeamLayout>
        </AuthenticatedLayout>
    );
}
