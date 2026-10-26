import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import { Link } from "@inertiajs/react";
import { useState } from "react";

export default function TeamRemove({ competition, team, onSuccess, onCancel }) {
    const [processing, setProcessing] = useState(false);

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
                    as={PrimaryButton}
                    method="delete"
                    href={route("competitions.teams.destroy", {
                        competition: competition.id,
                        team: team.id,
                    })}
                    preserveScroll
                    disabled={processing}
                    onStart={() => setProcessing(true)}
                    onFinish={() => setProcessing(false)}
                    onSuccess={onSuccess}
                >
                    Remove
                </Link>
            </div>
        </div>
    );
}
