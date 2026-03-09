import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import { Link, useForm } from "@inertiajs/react";

export default function TeamRemove({ competition, team, onSuccess, onCancel }) {
    if (!team) return <div></div>;

    return (
        <div className="p-6">
            <h3 className="text-lg font-medium text-primaryRed-600">
                Remove {team.name} from {competition.name}
            </h3>
            <p>
                Are you sure you want to remove {team.name}? This action cannot
                be undone.
            </p>
            <div className="flex gap-2 justify-end mt-8">
                <SecondaryButton onClick={() => onCancel()}>
                    Cancel
                </SecondaryButton>
                <Link
                    method="delete"
                    href={route("competitions.teams.destroy", [
                        competition.id,
                        team.id,
                    ])}
                >
                    <PrimaryButton>Remove</PrimaryButton>
                </Link>
            </div>
        </div>
    );
}
