import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import { Link } from "@inertiajs/react";
import { useState } from "react";

export default function CompetitionDelete({ competition, onCancel }) {
    const [processing, setProcessing] = useState(false);

    return (
        <div className="p-6">
            <h3 className="text-lg font-medium text-primaryRed-600">
                Delete competition
            </h3>
            <p>
                Are you sure you want to delete {competition.name}? This action
                cannot be undone.
            </p>
            <div className="flex gap-2 justify-end mt-8">
                <SecondaryButton onClick={() => onCancel()}>
                    Cancel
                </SecondaryButton>
                <Link
                    as={PrimaryButton}
                    method="delete"
                    href={route("competitions.destroy", competition.id)}
                    disabled={processing}
                    onStart={() => setProcessing(true)}
                    onFinish={() => setProcessing(false)}
                >
                    Delete
                </Link>
            </div>
        </div>
    );
}
